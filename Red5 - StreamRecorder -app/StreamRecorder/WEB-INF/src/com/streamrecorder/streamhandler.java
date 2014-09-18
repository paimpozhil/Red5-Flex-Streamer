package com.streamrecorder;

//log4j classes

//Red5 classes
import org.red5.server.adapter.ApplicationAdapter;
import org.red5.server.api.IClient;
import org.red5.server.api.IConnection;
import org.red5.server.api.IScope;

/**This is the sample application class */

public class streamhandler extends ApplicationAdapter{
/**Variable used for generating the log*/


/**This method will execute when Red5 server will start*/
public boolean appStart(IScope app){
if(super.appStart(app) == false){
return false;
}

return true;
}

/**This method will execute when first client will connect to Red5 server*/
public boolean roomStart(IScope room){
if(super.roomStart(room) == false){
return false;
}

return true;
}

/**This method will execute everytime when a client will connect to Red5 server*/
public boolean roomConnect(IConnection conn, Object params[]){
if(super.roomConnect(conn, params) == false){
return false;
}

return true;
}

/**This method will be called when a client disconnect from the room*/
public void roomDisconnect(IConnection conn){
super.roomDisconnect(conn);

}

/**This method will be called when a client will be disconnected from application*/
public void appDisconnect(IConnection conn){

}

/**This method will be called from the client. This method will show “Hello World!” on *the flash client side .
*/
public String sayHello(Object[] params){
return "as";
}


} ////////End of Application class

