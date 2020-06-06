import Vue from 'vue';
import VueRouter from 'vue-router';

import ChatUsingPusher from './components/ChatUsingPusher';
import ChatUsingEcho from './components/ChatUsingEcho';
import ChatWithVuex from './components/ChatWithVuex';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
        path: '/chat-echo',
        component: ChatUsingEcho,
    },
    {
      path: '/chat-pusher',
      component: ChatUsingPusher,
    },
    {
      path: '/chat-vue-socket',
      component: ChatWithVuex,
    }
  ]
});

export default router;