def simplex_method():
    # Parsing
    sol = []
    i_file = open('simplex_input.txt', 'r')
    lines = [x.strip() for x in i_file.readlines()]
    eqn = lines[1]
    constraints = lines[3:]

    print("Maximising " + str(eqn))
    print("Subject to:")
    for i in range(len(constraints)):
        con_split = constraints[i].split("<=")
        print(con_split[0] + "(+ s" + str(i + 1) + ") <=" + con_split[1])
    print()

    params = set()

    eqn_dict = {}
    eqn_terms = [x.strip() for x in eqn.split("=")[1].split("+")]
    for term in eqn_terms:
        coeff = -float(term.split("x")[0]) if term.split("x")[0] != '' else -1
        params.add(int(term.split("x")[1]))
        eqn_dict[int(term.split("x")[1])] = coeff

    con_dicts = []
    for constraint in constraints:
        ineq_split = constraint.split("<=")
        ineq_terms = [x.strip() for x in ineq_split[0].split("+")]

        ineq_dict = {}
        ineq_dict["rhs"] = int(ineq_split[1].strip())
        for term in ineq_terms:
            coeff = float(term.split("x")[0]) if term.split("x")[0] != '' else 1
            params.add(int(term.split("x")[1]))
            ineq_dict[int(term.split("x")[1])] = coeff
        con_dicts.append(ineq_dict)

    # Constructing Initial Tableau
    t = []

    obj_row = []
    obj_row.append(1.0)
    for i in range(1, max(params) + 1):
        try:
            obj_row.append(float(eqn_dict[i]))
        except:
            obj_row.append(0.0)
    for i in range(len(constraints) + 1):
        obj_row.append(0.0)
    t.append(obj_row)

    for i in range(len(con_dicts)):
        con_row = []
        con_row.append(0.0)
        for j in range(1, max(params) + 1):
            try:
                con_row.append(float(con_dicts[i][j]))
            except:
                con_row.append(0.0)
        for j in range(1, len(constraints) + 1):
            if i + 1 == j:
                con_row.append(1.0)
            else:
                con_row.append(0.0)
        con_row.append(float(con_dicts[i]["rhs"]))
        t.append(con_row)

    def print_tableau():
        for row in t:
            print([round(x, 4) for x in row])

    print("----- Initial Simplex Tableau -----")
    print_tableau()
    print()

    # Algorithm
    def div_handle_zero(n, d):
        return n / d if d else 0

    def simplex_iter():
        _, pcol_idx = min((val, idx) for (idx, val) in enumerate(t[0][:-1]))
        rhs_div_pivots = [div_handle_zero(t[i][len(t[0]) - 1], t[i][pcol_idx]) for i in range(1, len(t))]
        prow_idx = rhs_div_pivots.index(min([i for i in rhs_div_pivots if i > 0])) + 1
        pivot = t[prow_idx][pcol_idx]

        for i in range(len(t[0])):
            t[prow_idx][i] = t[prow_idx][i] / pivot

        coeffs = [t[i][pcol_idx] for i in range(len(t))]

        for i in range(len(t)):
            if i != prow_idx:
                for j in range(len(t[i])):
                    t[i][j] = t[i][j] - coeffs[i] * t[prow_idx][j]

    iteration = 0
    while all(x >= 0 for x in t[0]) != True:
        simplex_iter()
        iteration += 1
        print("----- Iteration " + str(iteration) + " -----")
        print_tableau()
        print()

    cols = list(map(list, zip(*t)))
    n_p = len(t[0]) - len(t) - 1

    print("----- Final Results -----")
    print("P = " + str(t[0][len(t[0]) - 1]))
    print()
    for i in range(1, 1 + n_p):
        if 1.0 in cols[i]:
            oneidx = cols[i].index(1)
            cols[i].remove(1.0)
            if len(set(cols[i])) == 1:
                sol.append(round(t[oneidx][len(t[0]) - 1], 4))
                print("x" + str(i) + " = " + str(round(t[oneidx][len(t[0]) - 1], 4)))
            else:
                print("x" + str(i) + " = 0")
        else:
            print("x" + str(i) + " = 0")
    print()
    for i in range(1 + n_p, len(t[0]) - 1):
        if 1.0 in cols[i]:
            oneidx = cols[i].index(1)
            cols[i].remove(1.0)
            if len(set(cols[i])) == 1:
                print("s" + str(i - n_p) + " = " + str(round(t[oneidx][len(t[0]) - 1], 4)))
            else:
                print("s" + str(i - n_p) + " = 0")
        else:
            print("s" + str(i - n_p) + " = 0")
    return sol

