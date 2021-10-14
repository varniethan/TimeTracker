import simplex
filename = 'simplex_input.txt'
product_1_price = str(input("Enter_p1"))
product_2_price =  str(input("Enter_p2"))

operation_1_product_1_hours =  str(input("Enter the time taken for operation 1 of product 1"))
operation_1_product_2_hours=  str(input("Enter the time taken for operation 1 of product 2"))

operation_2_product_1_hours =  str(input("Enter the time taken for operation 2 of product 1"))
operation_2_product_2_hours=  str(input("Enter the time taken for operation 2 of product 2"))

operation_3_product_1_hours =  str(input("Enter the time taken for operation 3 of product 1"))
operation_3_product_2_hours=  str(input("Enter the time taken for operation 3 of product 2"))

max_operaton_1_hours =  str(input("Enter Max operaton_1_hours"))
max_operaton_2_hours =  str(input("Enter Max operaton_2_hours"))
max_operaton_3_hours =  str(input("Enter Max operaton_3_hours"))

with open(filename, "w") as f:
  f.write('Maximise')
  f.write("\n")
  f.write(f"P = {product_1_price}x1 + {product_2_price}x2")
  f.write("\n")
  f.write('Subject to')
  f.write("\n")
  f.write(f"{operation_1_product_1_hours}x1 + {operation_1_product_2_hours}x2 <= {max_operaton_1_hours}")
  f.write("\n")
  f.write(f"{operation_2_product_1_hours}x1 + {operation_2_product_2_hours}x2 <= {max_operaton_2_hours}")
  f.write("\n")
  f.write(f"{operation_3_product_1_hours}x1 + {operation_3_product_2_hours}x2 <= {max_operaton_3_hours}")
  f.write("\n")
  f.write("-1x1 <= 0")
  f.write("\n")
  f.write("-1x1 <= 0")

simplex.simplex_method()
