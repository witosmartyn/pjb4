<%@ page import="javax.script.*" %>
<%@ page import="php.java.script.servlet.PhpServletScriptContext" %>
<%@ page import="java.util.HashMap" %>
<%@ page import="java.nio.file.Paths" %>
<%@ page import="java.nio.file.Files" %>
<%@ page import="java.io.IOException" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%!
//field
	private ThreadLocal<CompiledScript> scriptCached = new ThreadLocal<CompiledScript>();
//method
	private CompiledScript getScript(Servlet servlet, ServletContext application, HttpServletRequest request, HttpServletResponse response) throws ScriptException, IOException {
		ScriptEngine engine = (scriptCached.get() != null) ? scriptCached.get().getEngine() : new ScriptEngineManager().getEngineByName("php");
		engine.setContext(new PhpServletScriptContext(engine.getContext(), servlet, application, request, response));

		if (scriptCached.get() == null) {
			scriptCached.set(((Compilable) engine).compile(
					GetPhpScriptByname("board/board.php", application)
			));
		}

		return scriptCached.get();
	}
//my method
	private String GetPhpScriptByname(String scriptName,ServletContext app) throws IOException {
		String currentDirrectory = app.getRealPath("/");
		System.out.println(currentDirrectory);
		String php = new String(Files.readAllBytes(Paths.get(currentDirrectory + scriptName)));
//		System.out.println(php);
		return php;
	}
%>

<%


	CompiledScript script = null;
  try {
	 script = getScript(this, application, request, response);
	 script.eval();
	 Integer size = Integer.parseInt(request.getParameter("size"));
	 String color1 = request.getParameter("color1");

	  HashMap params = new HashMap();
	  params.put("size", size);
	  params.put("color1", color1);
	  params.put("color2", "red");
	  Object board = (((Invocable) script.getEngine()).invokeFunction("getBoard", size,params));
	  response.getWriter().write(board.toString());


  } catch (Exception ex) {
	out.println("Could not evaluate script: "+ex);
  } finally {
	if (script!=null) ((java.io.Closeable)script.getEngine()).close();
  }
%>
