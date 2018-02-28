from openpyxl import load_workbook
from openpyxl.utils import coordinate_from_string, column_index_from_string
import sqlite3
import parse
import Tables

def runThisBitch():
	print "Making tables..."
	Tables.dad()
	print "filling illustrator..."
	Tables.fillIllustrator()
	print "filling rhyme..."
	Tables.fillRhyme()
	print "filling volume..."
	Tables.fillVolume()
	print "filling contains..."
	Tables.fillContains()
	print "filling draw for..."
	Tables.fillDrawFor()
	print "filling drawn...Last one dont worry!"
	Tables.fillDrawn()
	print "Your Database is ready!"







