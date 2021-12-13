<template>
  <div>
    <div v-for="(todo, index) in todos" :key="index">
      <p>{{todo.id}}</p>
      <p>{{todo.content}}</p>
      <p>{{todo.deadline_date}}</p>
      <p>{{todo.priotity_id}}</p>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      todos: []
    };
  },
  methods: {
    getTodos() {
      axios.get("/api/todo").then(res => {
        this.todos = res.data;
      });
    }
  },
  mounted() {
    this.getTodos();
  }
};
</script>
