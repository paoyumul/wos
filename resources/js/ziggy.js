const Ziggy = {"url":"http:\/\/wos.test","port":null,"defaults":{},"routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"]},"password.email":{"uri":"password\/email","methods":["POST"]},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"]},"password.update":{"uri":"password\/reset","methods":["POST"]},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"]},"admin.dashboard":{"uri":"admin","methods":["GET","HEAD"]},"admin.users.delete":{"uri":"admin\/users\/{user}","methods":["DELETE"],"bindings":{"user":"id"}},"admin.users.index":{"uri":"admin\/users","methods":["GET","HEAD"]},"admin.users.create":{"uri":"admin\/users\/create","methods":["GET","HEAD"]},"admin.users.edit":{"uri":"admin\/users\/{user}\/edit","methods":["GET","HEAD"],"bindings":{"user":"id"}},"admin.users.update":{"uri":"admin\/users\/{user}","methods":["PATCH"],"bindings":{"user":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
