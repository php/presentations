#!/usr/bin/python
# questor.py		3/11/96 Joe Strout

# define some constants for future use

kQuestion = 'question'
kGuess = 'guess'

# define a function for asking yes/no questions
def yesno(prompt):
	ans = raw_input(prompt)
	return (ans[0]=='y' or ans[0]=='Y')

# define a node in the question tree (either question or guess)
class Qnode:
	# initialization method
	def __init__(self,guess):
		self.nodetype = kGuess
		self.desc = guess

	# get the question to ask	
	def query(self):
		if (self.nodetype == kQuestion):
			return self.desc + " "
		elif (self.nodetype == kGuess):
			return "Is it a " + self.desc + "? "
		else:
			return "Error: invalid node type!"

	# return new node, given a boolean response
	def nextnode(self,answer):
		return self.nodes[answer]

	# turn a guess node into a question node and add new item
	# give a question, the new item, and the answer 
	# for that item
	def makeQuest( self, question, newitem, newanswer ):

		# create new nodes for the new answer and 
		# old answer
		newAnsNode = Qnode(newitem)
		oldAnsNode = Qnode(self.desc)

		# turn this node into a question node
		self.nodetype = kQuestion
		self.desc = question

		# assign the yes and no nodes appropriately
		self.nodes = {newanswer:newAnsNode, 
			      not newanswer:oldAnsNode}
	
	

def traverse(fromNode):
	# ask the question
	yes = yesno( fromNode.query() )
	
	# if this is a guess node, then did we get it right?
	if (fromNode.nodetype == kGuess):
		if (yes):
			print "I'm a genius!!!"
			return
		# if we didn't get it right, return the node
		return fromNode
	
	# if it's a question node, then ask another question
	return traverse( fromNode.nextnode(yes) )

def run():
	# start with a single guess node
	topNode = Qnode('python')
	
	done = 0
	while not done:
		# ask questions till we get to the end
		result = traverse( topNode )
		
		# if result is a node, we need to add a question
		if (result):
			item = raw_input("OK, what were you thinking of? ")
			print "Enter a question that distinguishes a",
			print item, "from a", result.desc + ":"
			q = raw_input()
			ans = yesno("What is the answer for " + item + "? ")
			result.makeQuest( q, item, ans )
			print "Got it."
		
		# repeat until done
		print
		done = not yesno("Do another? ")
		print


# immediate-mode commands, for drag-and-drop or execfile() execution
if __name__ == '__main__':
	run()
	print
	raw_input("press Return>")
else:
	print "Module questor imported."
	print "To run, type: questor.run()"
	print "To reload after changes to the source, type: reload(questor)"

# end of questor.py
