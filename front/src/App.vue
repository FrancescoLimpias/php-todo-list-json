<script>
// libraries
import axios, { isCancel, AxiosError } from 'axios';

// components
import List from './components/List.vue';
import ListAdd from './components/ListAdd.vue';

// store
import { store } from './store.js';

export default {
  // compatibility
  name: "App",
  components: { List, ListAdd },

  // data
  data() {
    return {
      store,
      APIListURL: "http://localhost/api/list.php",
    };
  },

  methods: {
    refreshList() {
      axios.get(this.APIListURL, {
        params: {
          "request": "list",
        }
      }).then((response) => {
        this.store.list = response.data;
      }).catch((error) => {
        console.log(error);
      });
    }
  },

  //on mount
  mounted() {
    this.refreshList();
  },
}
</script>

<template>
  <h1>
    Todo List
  </h1>
  <List />
  <ListAdd />
</template>

<style scoped>

</style>
