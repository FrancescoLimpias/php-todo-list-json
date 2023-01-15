<script>
import { store } from '../store.js';

export default {

    data() {
        return {
            store,
        }
    },

    emits: ['task-updated', 'task-delete'],

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
                    <input type="text" class="form-control" placeholder="Task Title" v-model="task.title"
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
        </ul>
    </div>
</template>