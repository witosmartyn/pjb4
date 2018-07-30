import javax.servlet.ServletContext;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

public class MyUtil {
    static  String GetPhpScriptByname(String scriptName,ServletContext app) throws IOException {
        String currentDirrectory = app.getRealPath("/");
        System.out.println(currentDirrectory);
        String php = new String(Files.readAllBytes(Paths.get(currentDirrectory + scriptName)));
//		System.out.println(php);
        return php;
    }
}
