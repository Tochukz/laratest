import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    messages: [],
  },
  getters: {
    messages: state => state.messages,
  },
  mutations: {
    updateMessages(state, message) {
      Vue.set(state.messages, state.messages.length, `${message} ${new Date().toDateString()}`);
    }
  },
  actions: {

  }
})