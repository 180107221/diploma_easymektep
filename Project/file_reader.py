from tika import parser

raw = parser.from_file('W3.ppt')
print(raw['content'])