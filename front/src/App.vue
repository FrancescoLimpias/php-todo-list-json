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

    // provides api url by api's name
    urlByApi(apiName) {
      // return "http://localhost/api/" + apiName + ".php";
      return "http://localhost/api/list.php";
    },

    updateListFromJSON(response) {
      this.store.list = JSON.parse(
        response.request.responseText,
        (key, value) => {
          if(key == "check"){
            return (value === 'true')
          } else {
            return value;
          }
        }
        );
    },

    // fetch data (from server)
    fetchList() {
      axios.get(this.urlByApi("list"), {
        params: {
          "request": "list",
        }
      }).then((response) => {
        console.log(response);
        this.updateListFromJSON(response);
        // this.store.list = response.data;
      }).catch((error) => {
        console.log(error);
      });
    },

    // set task in list (to server)
    setTask(key, value /* the task */ = store.list[key]) {

      // configure params
      const params = {
        "request": "set",
        "value": value,
      }

      // check if key(index) is specified
      if (key) {
        params["key"] = key;
      }

      // send request
      axios
        .get(this.urlByApi("list"), { params })
        .then((response) => {
          this.updateListFromJSON(response);/* this.store.list = response.data; */
        })
        .catch((error) => { console.log(error) });
    },

    deleteTask(key) {

      // send request
      axios
        .get(this.urlByApi("list"), {
          params: {
            "request": "del",
            "key": key,
          }
        })
        .then((response) => {
          this.updateListFromJSON(response);/* this.store.list = response.data; */
        })
        .catch((error) => { console.log(error) });

    },
  },

  //on mount
  mounted() {

    // load data from server
    this.fetchList();

    // set auto refresh
    setInterval(this.fetchList, 1000 * 15);

  },
}
</script>

<template>

  <div class="container">
    <h1 class="text-center">Todo List</h1>
    <List @task-updated="setTask" @task-deleted="deleteTask" @task-add="setTask" />
  </div>

</template>
