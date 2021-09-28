import gdown
import pandas
from pulp import LpVariable, LpProblem, LpMinimize, lpSum, LpStatus

# url = "https://drive.google.com/uc?id=15BPH7-3GGWBfXPJQ3stkT6SHQECbT-pt"
# output = "shifts.csv"
# gdown.download(url, output, quiet=False)

#matrix to show which shift each time window is associated with.
data = pandas.read_csv("shifts.csv", index_col=0)

data = data.fillna(0).applymap(lambda x: 1 if x == "X" else x)

array = data.drop(index=["Wage rate per 9h shift ($)"], columns=["Workers Required"]).values
array

# number of shifts
number_of_shifts = array.shape[1]

# number of time windows
number_of_time_windows = array.shape[0]

# number of workers required per time window
workers_per_time_windows = data["Workers Required"].values

# wage rate per shift
wage_rate_per_shift = data.loc["Wage rate per 9h shift ($)", :].values.astype(int)

# Decision variables
#Decision variables are unknown quantities that we want to solve for. Here, the decision variable is the number of workers per shift.
no_of_workers_needed_per_shift = LpVariable.dicts("num_workers", list(range(number_of_shifts)), lowBound=0, cat="Integer")

# Create problem
prob = LpProblem("scheduling_workers", LpMinimize)

# prob += lpSum([wage_rate_per_shift[j] * no_of_workers_needed_per_shift[j] for j in range(number_of_shifts)])

for j in range(number_of_shifts):
    prob += lpSum([wage_rate_per_shift[j] * no_of_workers_needed_per_shift[j]])

for t in range(number_of_time_windows):
    # for j in range(number_of_shifts):
    #     if lpSum([array[t, j] * no_of_workers_needed_per_shift[j]]) >= workers_per_time_windows
    #     prob += lpSum([array[t, j] * no_of_workers_needed_per_shift[j]])
    prob += lpSum([array[t, j] * no_of_workers_needed_per_shift[j] for j in range(number_of_shifts)]) >= workers_per_time_windows[t]

prob.solve()
print("Status:", LpStatus[prob.status])

for shift in range(number_of_shifts):
    print(
        f"The number of workers needed for shift {shift} is {int(no_of_workers_needed_per_shift[shift].value())} workers"
    )
