'''
	Program Created by Paul Schimmelpfenning and is licensed under the
	Creative Commons BY-NC-SA 3.0 License - http://creativecommons.org/licenses/by-nc-sa/3.0/
	My website is at http://www.pjschim.com
'''
import sys

colourcheck = 0
permutationcheck = 0
cornercheck = 0
edgecheck = 0
#original positions
basememory = {}
#side labels
sides = ["U","L","F","R","B","D"]
#centre pieces
centres = {}
#Ask for data input and figure out centres
for side in sides:
	for i in range(1, 10):
		p = str(i)
		if sys.version_info < (3, 0):
			basememory[side + p] = raw_input(side + p + ": ")
		else:
			basememory[side + p] = input(side + p + ": ")
		if i == 5:
			centres[side + p] = basememory[side + p]
#making sure only 6 colours appear, there are 9 of each colour, and the centres are all different
centres = list(set(centres.values()))
colours = list(set(basememory.values()))
checksum = 0
colourcheck = 2
if len(colours) == 6 and len(centres) == 6:
	for colour in colours:
		if basememory.values().count(colour) == 9:
			checksum += 1
		if checksum == 6:
			colourcheck = 1
#setup of corners and edges
corners = [
	[basememory["U1"], basememory["L1"], basememory["B3"]],
	[basememory["U3"], basememory["B1"], basememory["R3"]],
	[basememory["U9"], basememory["R1"], basememory["F3"]],
	[basememory["U7"], basememory["F1"], basememory["L3"]],
	[basememory["D1"], basememory["L9"], basememory["F7"]],
	[basememory["D3"], basememory["F9"], basememory["R7"]],
	[basememory["D9"], basememory["R9"], basememory["B7"]],
	[basememory["D7"], basememory["B9"], basememory["L7"]]
]
cornersfinish = [
	[
		[basememory["U5"], basememory["L5"], basememory["B5"]],
		[basememory["L5"], basememory["B5"], basememory["U5"]],
		[basememory["B5"], basememory["U5"], basememory["L5"]]
	],
	[
		[basememory["U5"], basememory["B5"], basememory["R5"]],
		[basememory["B5"], basememory["R5"], basememory["U5"]],
		[basememory["R5"], basememory["U5"], basememory["B5"]]
	],
	[
		[basememory["U5"], basememory["R5"], basememory["F5"]],
		[basememory["R5"], basememory["F5"], basememory["U5"]],
		[basememory["F5"], basememory["U5"], basememory["R5"]]
	],
	[
		[basememory["U5"], basememory["F5"], basememory["L5"]],
		[basememory["F5"], basememory["L5"], basememory["U5"]],
		[basememory["L5"], basememory["U5"], basememory["F5"]]
	],
	[
		[basememory["D5"], basememory["L5"], basememory["F5"]],
		[basememory["L5"], basememory["F5"], basememory["D5"]],
		[basememory["F5"], basememory["D5"], basememory["L5"]]
	],
	[
		[basememory["D5"], basememory["F5"], basememory["R5"]],
		[basememory["F5"], basememory["R5"], basememory["D5"]],
		[basememory["R5"], basememory["D5"], basememory["F5"]]
	],
	[
		[basememory["D5"], basememory["R5"], basememory["B5"]],
		[basememory["R5"], basememory["B5"], basememory["D5"]],
		[basememory["B5"], basememory["D5"], basememory["R5"]]
	],
	[
		[basememory["D5"], basememory["B5"], basememory["L5"]],
		[basememory["B5"], basememory["L5"], basememory["D5"]],
		[basememory["L5"], basememory["D5"], basememory["B5"]]
	]
]
edges = [
	[basememory["U2"], basememory["B2"]],
	[basememory["U6"], basememory["R2"]],
	[basememory["U8"], basememory["F2"]],
	[basememory["U4"], basememory["L2"]],
	[basememory["B6"], basememory["L4"]],
	[basememory["B4"], basememory["R6"]],
	[basememory["F6"], basememory["R4"]],
	[basememory["F4"], basememory["L6"]],
	[basememory["D2"], basememory["F8"]],
	[basememory["D6"], basememory["R8"]],
	[basememory["D8"], basememory["B8"]],
	[basememory["D4"], basememory["L8"]]
]
edgesfinish = [
	[
		[basememory["U5"], basememory["B5"]],
		[basememory["B5"], basememory["U5"]]
	],
	[
		[basememory["U5"], basememory["R5"]],
		[basememory["R5"], basememory["U5"]]
	],
	[
		[basememory["U5"], basememory["F5"]],
		[basememory["F5"], basememory["U5"]]
	],
	[
		[basememory["U5"], basememory["L5"]],
		[basememory["L5"], basememory["U5"]]
	],
	[
		[basememory["B5"], basememory["L5"]],
		[basememory["L5"], basememory["B5"]]
	],
	[
		[basememory["B5"], basememory["R5"]],
		[basememory["R5"], basememory["B5"]]
	],
	[
		[basememory["F5"], basememory["R5"]],
		[basememory["R5"], basememory["F5"]]
	],
	[
		[basememory["F5"], basememory["L5"]],
		[basememory["L5"], basememory["F5"]]
	],
	[
		[basememory["D5"], basememory["F5"]],
		[basememory["F5"], basememory["D5"]]
	],
	[
		[basememory["D5"], basememory["R5"]],
		[basememory["R5"], basememory["D5"]]
	],
	[
		[basememory["D5"], basememory["B5"]],
		[basememory["B5"], basememory["D5"]]
	],
	[
		[basememory["D5"], basememory["L5"]],
		[basememory["L5"], basememory["D5"]]
	]
]
#unique edges and corners test
if colourcheck:
	uniquecheck = 0
	uniquecorners = []
	uniqueedges = []
	for i in corners:
		for j in range(8):
			if i in cornersfinish[j]:
				uniquecorners.append(j)
	for i in edges:
		for j in range(12):
			if i in edgesfinish[j]:
				uniqueedges.append(j)
	uniquecorners = list(set(uniquecorners))
	uniqueedges = list(set(uniqueedges))
	if len(uniquecorners) == 8 and len(uniqueedges) == 12:
		uniquecheck = 1
#permutation parity test
if uniquecheck:
	ccheck = 0
	echeck = 0
	clist = []
	elist = []
	error = 0
	for corner in corners:
		if not error:
			error = 1
			for i in range(8):
				if corner in cornersfinish[i]:
					error = 0
					clist.append(i)
	for edge in edges:
		if not error:
			error = 1
			for j in range(12):
				if edge in edgesfinish[j]:
					error = 0
					elist.append(j)
	if not error:
		def swap(list, left, right):
			rightbackup = list[right]
			list[right] = list[left]
			list[left] = rightbackup
			return list
		newclist = clist
		newelist = elist
		for i in range(len(newclist) - 1):
			min = i
			for j in range(i + 1, len(newclist)):
				if newclist[j] < newclist[min]:
					min = j
			if i != min:
				newclist = swap(newclist, i, min)
				ccheck += 1
		for i in range(len(newelist) - 1):
			min = i
			for j in range(i + 1, len(newelist)):
				if newelist[j] < newelist[min]:
					min = j
			if i != min:
				newelist = swap(newelist, i, min)
				echeck += 1
	if (ccheck + echeck) % 2 == 0:
		permutationcheck = 1
#corner parity test
if permutationcheck:
	cornerb = 0
	cornerc = 0
	for corner in corners:
		for i in range(8):
			if corner in cornersfinish[i]:
				if cornersfinish[i].index(corner) == 1:
					cornerb += 1
				elif cornersfinish[i].index(corner) == 2:
					cornerc += 1
	if (cornerb + (2 * cornerc)) % 3 == 0:
		cornercheck = 1
#make sure edges are legal
if cornercheck:
	checksum = 0
	if basememory["U2"] == basememory["U5"] or basememory["U2"] == basememory["D5"]:
		checksum += 1
	elif basememory["B2"] != basememory["U5"] and basememory["B2"] != basememory["D5"] and (basememory["U2"] == basememory["F5"] or basememory["U2"] == basememory["B5"]):
		checksum += 1
	if basememory["U4"] == basememory["U5"] or basememory["U4"] == basememory["D5"]:
		checksum += 1
	elif basememory["L2"] != basememory["U5"] and basememory["L2"] != basememory["D5"] and (basememory["U4"] == basememory["F5"] or basememory["U4"] == basememory["B5"]):
		checksum += 1
	if basememory["U6"] == basememory["U5"] or basememory["U6"] == basememory["D5"]:
		checksum += 1
	elif basememory["R2"] != basememory["U5"] and basememory["R2"] != basememory["D5"] and (basememory["U6"] == basememory["F5"] or basememory["U6"] == basememory["B5"]):
		checksum += 1
	if basememory["U8"] == basememory["U5"] or basememory["U8"] == basememory["D5"]:
		checksum += 1
	elif basememory["F2"] != basememory["U5"] and basememory["F2"] != basememory["D5"] and (basememory["U8"] == basememory["F5"] or basememory["U8"] == basememory["B5"]):
		checksum += 1
	if basememory["D2"] == basememory["U5"] or basememory["D2"] == basememory["D5"]:
		checksum += 1
	elif basememory["F8"] != basememory["U5"] and basememory["F8"] != basememory["D5"] and (basememory["D2"] == basememory["F5"] or basememory["D2"] == basememory["B5"]):
		checksum += 1
	if basememory["D4"] == basememory["U5"] or basememory["D4"] == basememory["D5"]:
		checksum += 1
	elif basememory["L8"] != basememory["U5"] and basememory["L8"] != basememory["D5"] and (basememory["D4"] == basememory["F5"] or basememory["D4"] == basememory["B5"]):
		checksum += 1
	if basememory["D6"] == basememory["U5"] or basememory["D6"] == basememory["D5"]:
		checksum += 1
	elif basememory["R8"] != basememory["U5"] and basememory["R8"] != basememory["D5"] and (basememory["D6"] == basememory["F5"] or basememory["D6"] == basememory["B5"]):
		checksum += 1
	if basememory["D8"] == basememory["U5"] or basememory["D8"] == basememory["D5"]:
		checksum += 1
	elif basememory["B8"] != basememory["U5"] and basememory["B8"] != basememory["D5"] and (basememory["D8"] == basememory["F5"] or basememory["D8"] == basememory["B5"]):
		checksum += 1
	if basememory["F4"] == basememory["U5"] or basememory["F4"] == basememory["D5"]:
		checksum += 1
	elif basememory["L6"] != basememory["U5"] and basememory["L6"] != basememory["D5"] and (basememory["F4"] == basememory["F5"] or basememory["F4"] == basememory["B5"]):
		checksum += 1
	if basememory["F6"] == basememory["U5"] or basememory["F6"] == basememory["D5"]:
		checksum += 1
	elif basememory["R4"] != basememory["U5"] and basememory["R4"] != basememory["D5"] and (basememory["F6"] == basememory["F5"] or basememory["F6"] == basememory["B5"]):
		checksum += 1
	if basememory["B4"] == basememory["U5"] or basememory["B4"] == basememory["D5"]:
		checksum += 1
	elif basememory["R6"] != basememory["U5"] and basememory["R6"] != basememory["D5"] and (basememory["B4"] == basememory["F5"] or basememory["B4"] == basememory["B5"]):
		checksum += 1
	if basememory["B6"] == basememory["U5"] or basememory["B6"] == basememory["D5"]:
		checksum += 1
	elif basememory["L4"] != basememory["U5"] and basememory["L4"] != basememory["D5"] and (basememory["B6"] == basememory["F5"] or basememory["B6"] == basememory["B5"]):
		checksum += 1
	if checksum % 2 == 0:
		edgecheck = 1
if edgecheck:
	#edge solve
	temp = -1
	temp2 = -2
	piece = edges[8]
	flip = 0
	i = -1
	solvededges = []
	counter = 0
	finishedsolve = ""
	edgechart = [[0, 16], [1, 12], [2, 8], [3, 4], [17, 7], [19, 13], [9, 15], [11, 5], [20, 10], [21, 14], [22, 18], [23, 6]]
	move = [
		"M2 ", "R' U R U' M2 U R' U' R ", "U2 M' U2 M' ", "L U' L' U M2 U' L U L' ",
		"B L' B' M2 B L B' ", "B L2 B' M2 B L2 B' ", "B L B' M2 B L' B' ",
		"L' B L B' M2 B L' B' L ", "D M' U R2 U' M U R2 U' D' M2 ", "U R U' M2 U R' U' ",
		"Set", "U' L' U M2 U' L U ", "B' R B M2 B' R' B ", "R B' R' B M2 B' R B R' ",
		"B' R' B M2 B' R B ", "B' R2 B M2 B' R2 B ", "B' R B U R2 U' M2 U R2 U' B' R' B ",
		"U' L U M2 U' L' U ", "M2 D U R2 U' M' U R2 U' M D' ", "U R' U' M2 U R U' ",
		"Set", "U R2 U' M2 U R2 U' ", "M U2 M U2 ", "U' L2 U M2 U' L2 U "
                ]
	for x in edges:
		i += 1
		if x in edgesfinish[i]:
			if x != edgesfinish[i][0]:
				if i == 2 or i == 10:
					if i == 2:
						finishedsolve += move[edgechart[i][1]] + move[edgechart[10][0]]
					else:
						finishedsolve += move[edgechart[i][1]] + move[edgechart[2][0]]
				elif i != 8:
					finishedsolve += move[edgechart[i][1]] + move[edgechart[i][0]]
				if i != 8:
					flip += 1
					flip % 2
			if i != 8:
				solvededges.append(i)
	while len(solvededges) != 11:
		for i in range(12):
			if piece in edgesfinish[i]:
				if i != 8 and temp != temp2:
					temp2 = i
					j = edgesfinish[i].index(piece)
					if (i == 2 or i == 10) and counter % 2 == 1:
						if i == 2:
							finishedsolve += move[edgechart[10][(j + flip) % 2]]
						else:
							finishedsolve += move[edgechart[2][(j + flip) % 2]]
					else:
						finishedsolve += move[edgechart[i][(j + flip) % 2]]
					piece = edges[i]
					if (j + flip) % 2 == 0:
						flip = 0
					else:
						flip = 1
					solvededges.append(i)
					counter += 1
				else:
					for x in range(12):
						if x not in solvededges and x != 8:
							if (x == 2 or x == 10) and counter % 2 == 1:
								if x == 2:
									finishedsolve += move[edgechart[10][0]]
								else:
									finishedsolve += move[edgechart[2][0]]
							else:
								finishedsolve += move[edgechart[x][0]]
							piece = edges[x]
							temp = x
							flip = 0
							counter += 1
							break
				break
	#parity fix
	if counter % 2 == 1:
		finishedsolve += "D' L2 D M2 D' L2 D "
	#corner solve
	temp = -1
	temp2 = -2
	piece = corners[0]
	flip = 0
	i = -1
	solvedcorners = []
	cornerchart = [[0, 4, 17], [1, 16, 13], [2, 12, 9], [3, 8, 5], [20, 6, 11], [21, 10, 15], [22, 14, 19], [23, 18, 7]]
	setup = [
		"Set", "R D' ", "F ", "F R' ", "Set", "F2 ", "D2 R ", "D2 ", "F' D ", "F2 D ", "F D ", "D ",
		"R' ", "R2 ", "R ", "", "R' F ", "Set", "D' R ", "D' ", "F' ", "D' F' ", "D2 F' ", "D F' "
	]
	reversesetup = [
		"Set", "D R' ", "F' ", "R F' ", "Set", "F2 ", "R' D2 ", "D2 ", "D' F ", "D' F2 ", "D' F' ", "D' ",
		"R ", "R2 ", "R' ", "", "F' R ", "Set", "R' D ", "D ", "F ", "F D ", "F D2 ", "F D' "
	]
	modyperm = "R U' R' U' R U R' F' R U R' U' R' F R "
	for x in corners:
		i += 1
		if x in cornersfinish[i]:
			if x != cornersfinish[i][0]:
				if i != 0:
					if x == cornersfinish[i][1]:
						finishedsolve += setup[cornerchart[i][1]] +\
							modyperm + reversesetup[cornerchart[i][1]] +\
							setup[cornerchart[i][2]] + modyperm +\
							reversesetup[cornerchart[i][2]]
						flip += 1
						flip %= 3
					elif x == cornersfinish[i][2]:
						finishedsolve += setup[cornerchart[i][2]] +\
							modyperm + reversesetup[cornerchart[i][2]] +\
							setup[cornerchart[i][1]] + modyperm +\
							reversesetup[cornerchart[i][1]]
						flip += 2
						flip %= 3
			if i != 0:
				solvedcorners.append(i)
	while len(solvedcorners) != 7:
		for i in range(8):
			if piece in cornersfinish[i]:
				if i != 0 and temp != temp2:
					temp2 = i
					j = cornersfinish[i].index(piece)
					finishedsolve += setup[cornerchart[i][(j + flip) % 3]] +\
						modyperm + reversesetup[cornerchart[i][(j + flip) % 3]]
					piece = corners[i]
					if (j + flip) % 3 == 0:
						flip = 0
					elif (j + flip) % 3 == 1:
						flip = 1
					else:
						flip = 2
					solvedcorners.append = i
				else:
					for x in range(8):
						if x not in solvedcorners and x != 0:
							finishedsolve += setup[cornerchart[x][0]] +\
								modyperm + reversesetup[cornerchart[x][0]]
							piece = corners[x]
							temp = x
							flip = 0
							break
				break
	#answeroptimization and answer print
	allfaces = ["U", "L", "F", "R", "B", "D", "M"]
	for i in range(4):
		for z in allfaces:
			finishedsolve = finishedsolve.replace(z + "2 " + z + "2 ", "")
                        finishedsolve = finishedsolve.replace(z + "2 " + z + "' ", z + " ")
                        finishedsolve = finishedsolve.replace(z + "' " + z + "2 ", z + " ")
                        finishedsolve = finishedsolve.replace(z + "2 " + z + " ", z + "' ")
                        finishedsolve = finishedsolve.replace(z + " " + z + "2 ", z + "' ")
                        finishedsolve = finishedsolve.replace(z + "' " + z + " ", "")
                        finishedsolve = finishedsolve.replace(z + " " + z + "' ", "")
                        finishedsolve = finishedsolve.replace(z + "' " + z + "' ", z + "2 ")
                        finishedsolve = finishedsolve.replace(z + " " + z + " ", z + "2 ")
	finishedsolve = finishedsolve[:-1]
	print(finishedsolve)
else:
	print("This cube is in an unsolveable state")
