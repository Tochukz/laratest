<template>
   <div>
      <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="/">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                             <router-link to="/chat-echo" class="nav-link" active-class="active" >Chat Using Echo</router-link>
                        </li>                        
                         <li class="nav-item">
                          <router-link to="/chat-pusher" class="nav-link" active-class="active">Chat Using Pusher</router-link>
                        </li>
                         <li class="nav-item">
                          <router-link to="/chat-vue-socket" class="nav-link" active-class="active">Chat With Socket</router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      </div>
      <div class="container" style="margin-top: 1em">
        <router-view />
      </div>
    </div>
</template>