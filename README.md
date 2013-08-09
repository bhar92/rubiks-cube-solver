Rubik's Cube Solver(s) created by Paul Schimmelpfenning and is licensed under the Creative Commons BY-NC-SA 3.0 License - http://creativecommons.org/licenses/by-nc-sa/3.0/ My website is at http://www.pjschim.com and you can fill out the contact form if you have any questions or concerns about this program or if you found a bug or error message that needs to be fixed.

You may use, modify, and redistribute any of the code from my Rubik's Cube Solver program(s) for any non-commercial use as long as I am credited as the creator of the calendar calculator program and this same license must be on any copied or modified version of this program, as per the rules of the license.

Using this program in any way assumes you agree to all the licensing conditions of this program.

This program works in PHP, Python 2.X and Python 3.X

HOW TO USE:

If you are using the PHP version of this program, make sure you have PHP installed and know how to run a PHP script.  If you are using the Python version of this program, make sure you have either Python 2.X or Python 3.X installed and know how to run a Python program.

All of the colours you imput into the program will be stored in a hash array (dictionary) called $basememory (basememory in Python).  The program will ask you the colours the spots of your cube are in by printing out a letter (U, L, F, R, B, and D) and a number (1 through 9).  This means the program will ask you for imput for U1 all the way to D9 with all the other letter and number combinations in between.  It will go from 1 to 9 for each letter in order of the letters posted, so U1, U2, U3, . . ., L1, . . ., F1, . . ., R1, . . ., B1, . . ., D1, . . ., D7, D8, D9.

The letters represent the side the program is asking imput for (U is Up, L is Left, F is Face, R is Right, B is Back and D is Down) and the numbers represent to position of the side the program is asking imput for.  After you put in an imput, just press Enter or Return to go to the next requested position.  Do this until you finish D9.  I will now show what the program means by drawing out a crudely made diagram using just each side individually along with what will be the side above it and what will be the side below it if you are looking directly at the side:



Back side is above

U1 U2 U3
U4 U5 U6 - When looking directly at Up side
U7 U8 U9

Front side is below



Up side is above

L1 L2 L3
L4 L5 L6 - When looking directly at Left side
L7 L8 L9

Down side is below



Up side is above

F1 F2 F3
F4 F5 F6 - When looking directly at Front side
F7 F8 F9

Down side is below



Up side is above

R1 R2 R3
R4 R5 R6 - When looking directly at Right side
R7 R8 R9

Down side is below



Up side is above

B1 B2 B3
B4 B5 B6 - When looking directly at Back side
B7 B8 B9

Down side is below



Front is above

D1 D2 D3
D4 D5 D6 - When looking directly at Down side
D7 D8 D9

Back is below



You can enter whatever you want as the name of each colour, but the colour names must be consistant, so you must have 6 different colour names and 9 of each colour name and the centres must all be different.  If the cube does not meet these conditions or the cube is not in a solvable state or has any duplicate pieces, the program will print "This cube is in an unsolvable state!".

If the cube is in a solvable state after you put in all of the colour locations, it will print out the turns required to solve your cube.  Make sure that your cube's Up side, Left side, Front side, Right side, Back side and Down side are in the same sides as they were when placing in the colour information and make sure that the Up side is facing Up, the Left side is facing Left, the Front side is facing Front, the Right side is facing Right, the Back side is facing Back and the Down side is facing Down.
