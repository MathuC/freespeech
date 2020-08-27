#source: https://www.kite.com/python/answers/how-to-replace-a-string-within-a-file-in-python#:~:text=Use%20str.,a%20string%20within%20a%20file&text=strip()%20to%20strip%20the,with%20new%20in%20the%20line.
#source for printing php files in current directory: https://stackoverflow.com/questions/3207219/how-do-i-list-all-files-of-a-directory

#source of another technique that works: https://stackoverflow.com/questions/39086/search-and-replace-a-line-in-a-file-in-python

import glob #for giving me php files in current directory as a list

def replace(path, text, newText):
    readingFile = open(path, "r")

    newFileContent = ""
    for line in readingFile:
        strippedLine = line.strip()
        newLine = strippedLine.replace(text, newText)
        newFileContent += newLine +"\n"
    readingFile.close()

    writingFile = open(path, "w")
    writingFile.write(newFileContent)
    writingFile.close()


text=" ";
newText=" ";
directory= glob.glob("*.php") #returns all php files in a directory as a list
for file in directory: 
    replace(file, text, newText)





