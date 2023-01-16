<script>
import { store } from '../store.js';
import ListAdd from './ListAdd.vue';

export default {

    name: "List",

    components: {ListAdd},

    data() {
        return {
            store,
        }
    },

    emits: ['task-updated', 'task-delete', 'task-add'],

}

</script>

<template>
    <div class="ListComponent">
        <ul class="list-group">
            <li v-for="(task, key) in store.list" :class="{
                'list-group-item': true,
                'd-flex': true,
                'align-items-center': true,
                'completed': task.check
            }">
                <div class="form-check mr-3">
                    <input type="checkbox" class="form-check-input" v-model="task.check"
                        @blur="$emit('task-updated', key)">
                </div>
                <div class="form-group mr-3">
                    <input type="text" class="form-control" :placeholder="key" v-model="task.title"
                        @blur="$emit('task-updated', key)">
                </div>
                <div class="form-group mr-3">
                    <input type="text" class="form-control" placeholder="Task Description" v-model="task.desc"
                        @blur="$emit('task-updated', key)">
                </div>
                <div class="ml-auto">
                    <button class="btn btn-danger btn-sm" @click="$emit('task-deleted', key)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </li>
            <ListAdd @task-add="(k, v) => $emit('task-add', k, v)"/>
        </ul>
    </div>
</template>