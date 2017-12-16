import web

urls = ('/.*', 'hello')

class hello:
	def GET(self):
		return "Hello World."

if_name_=="_main_":
	app = web.application(urls, globals())
	app.run()
#application = web.application(urls, globals()).wsgifunc()
