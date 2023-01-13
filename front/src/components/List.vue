<script>
import { store } from '../store.js';

export default{
    data(){
        return {
            store,
        }
    },

    emits: ['task-updated', 'task-delete'],
}

</script>

<template>
    <div class="ListComponent">
        <ul>
            <li v-for="(task, key) in store.list">
                <input type="text" v-model="task.title" @blur="$emit('task-updated', key)" placeholder="insert task title" >
                <input type="text" v-model="task.desc" @blur="$emit('task-updated', key)" >
                <button @click="$emit('task-deleted', key)">Delete</button>
            </li>
        </ul>
    </div>
</template>