import web

db = web.database(dbn='sqlite', db='todo.db')


def get_todos():
    return db.select('todo', order='id')

def new_todo(text):
    db.insert('todo', title=text)

def del_todo(id):
    return db.delete('todo', where="id="+str(id))

