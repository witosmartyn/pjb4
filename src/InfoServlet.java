import php.java.script.servlet.PhpServletScriptContext;

import javax.script.*;
import javax.servlet.Servlet;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

@WebServlet(name = "InfoServlet",urlPatterns="/others/infoServlet")
public class InfoServlet extends HttpServlet {

    private ThreadLocal<CompiledScript> scriptCached = new ThreadLocal<CompiledScript>();
    private CompiledScript script = null;




    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        try {
            this.script = getScript(this, getServletContext(), request, response);
            this.script.eval();
            Object result = (((Invocable) script.getEngine()).invokeFunction("getServerInfo", "reguestfrom_jee"));
            String strResult = result.toString();
            response.getWriter().write(strResult);

        } catch (Exception ex) {
            response.getWriter().write("Could not evaluate script: "+ex);

        } finally {
            if (this.script!=null) ((java.io.Closeable)this.script.getEngine()).close();
        }
    }



    private CompiledScript getScript(Servlet servlet, ServletContext application, HttpServletRequest request, HttpServletResponse response) throws ScriptException, IOException {
        ScriptEngine engine = (scriptCached.get() != null) ? scriptCached.get().getEngine() : new ScriptEngineManager().getEngineByName("php");
        engine.setContext(new PhpServletScriptContext(engine.getContext(), servlet, application, request, response));

        if (scriptCached.get() == null) {
            scriptCached.set(((Compilable) engine).compile(
                    MyUtil.GetPhpScriptByname("others/phpinfo.php", application)
            ));
        }

        return scriptCached.get();
    }
    
    
    
    
}
