#Copyright (c) 2019 Tsubasa Kato
#Released under the MIT license
#https://opensource.org/licenses/mit-license.php
#Script modified from Christopher Ottesen's script at:
#https://dataespresso.com/en/2018/07/22/Tutorial-Generating-random-numbers-with-a-quantum-computer-Python/
from projectq.ops import H, Measure
from projectq import MainEngine

quantum_engine = MainEngine()
output_rnd = 0

def random_number(quantum_engine):
	qubit = quantum_engine.allocate_qubit()
	H | qubit
	Measure | qubit
	random_number = int(qubit)
	return random_number

random_numbers_list = []

quantum_engine = MainEngine()


#adds random number (0 or 1) made by quantum_engine.
for i in range(8):
	output_rnd = output_rnd + (random_number(quantum_engine))
#	random_numbers_list.append(random_number(quantum_engine))
#Prints out added random number to make it become read from search php script
print(output_rnd)
quantum_engine.flush()
