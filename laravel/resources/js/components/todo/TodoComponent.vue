<template>
  <div>

    <!-- 第1領域 -->
    <!-- <h1>{{priorities[0].name}}</h1>
    <input type="text" v-model="addTodo1">
    <input type="button" value="追加" @click="addTodo(addTodo1, priorities[0].id)">
    <div v-for="priority1_todo in priority1_todos" :key="priority1_todo.id">
      <input type="text" v-model="priority1_todo.content">
      <input type="button" value="更新" @click="updateTodo(priority1_todo)">
      <input type="button" value="削除" @click="deleteTodo(priority1_todo)">
    </div> -->

    <!-- 第2領域 -->
    <!-- <h1>{{priorities[1].name}}</h1>
    <input type="text" v-model="addTodo2">
    <input type="button" value="追加" @click="addTodo(addTodo2, priorities[1].id)">
    <div v-for="priority2_todo in priority2_todos" :key="priority2_todo.id">
      <input type="text" v-model="priority2_todo.content">
      <input type="button" value="更新" @click="updateTodo(priority2_todo)">
      <input type="button" value="削除" @click="deleteTodo(priority2_todo)">
    </div> -->

    <!-- 第3領域 -->
    <!-- <h1>{{priorities[2].name}}</h1>
    <input type="text" v-model="addTodo3">
    <input type="button" value="追加" @click="addTodo(addTodo3, priorities[2].id)">
    <div v-for="priority3_todo in priority3_todos" :key="priority3_todo.id">
      <input type="text" v-model="priority3_todo.content">
      <input type="button" value="更新" @click="updateTodo(priority3_todo)">
      <input type="button" value="削除" @click="deleteTodo(priority3_todo)">
    </div> -->

    <!-- 第4領域 -->
    <!-- <h1>{{priorities[3].name}}</h1>
    <input type="text" v-model="addTodo4">
    <input type="button" value="追加" @click="addTodo(addTodo4, priorities[3].id)">
    <div v-for="priority4_todo in priority4_todos" :key="priority4_todo.id">
      <input type="text" v-model="priority4_todo.content">
      <input type="button" value="更新" @click="updateTodo(priority4_todo)">
      <input type="button" value="削除" @click="deleteTodo(priority4_todo)">
    </div> -->

    <TodoItem
      @add-button-click="addTodo"
      :todoDatas="priority1_todos"
      :priotiry="priorities[0]">
    </TodoItem>

  </div>
</template>

<script>
import TodoItem from './TodoItem.vue';

export default {
  components: {
    TodoItem
  },
  data: function() {
    return {
      todos: [],
    	priorities:[],
      addTodo1: "",
      addTodo2: "",
      addTodo3: "",
      addTodo4: "",
    };
  },
  methods: {
    // すべてのTodoデータ取得
    getTodos: function() {
      axios.get("/api/todo").then(res => {
        this.todos = res.data;
      })
    },
    // Todoマスターデータを取得
    getPrioriryMaster: function() {
        axios.get("api/prioriry").then(res => {
        this.priorities = res.data;
      });
    },
    // 追加
    addTodo: function(todo_content, priorityid) {
      console.log(todo_content,priorityid);
      if (!todo_content.length) {
        return
      }
      axios.post('api/todo', {
        content: todo_content,
        priority_id: priorityid
      })
      .then(response => {
        this.todos.unshift(response.data);
        alert("追加しました");
        todo_content = "";
        this.addTodo1 = "";
        this.addTodo2 = "";
        this.addTodo3 = "";
        this.addTodo4 = "";

      })
      .catch(function(error) {
        console.log(error);
      });
    },
    // 更新
    updateTodo(todo) {
      if (!todo.content.length) {
        return
      }
      axios.put('api/todo/' + todo.id, {
        content: todo.content,
        deadline_date: todo.content,
        priority_id: todo.priority_id
      })
      .then(response => {
        alert("更新しました。")
      })
      .catch(function(error) {
        console.log(error);
      });
    },
    // 削除
    deleteTodo(todo) {
      if (!confirm('削除しますか?')) {
        return
      }
      axios.delete('api/todo/' + todo.id, {
      })
      .then(response => {
        let index = this.todos.indexOf(todo)
        this.todos.splice(index, 1)
        alert("削除しました");
      })
      .catch(function(error) {
        console.log(error);
      });
    }
  },
  computed: {

    priority1_todos: function() {
      return this.todos.filter(todo => todo.priority_id === 1);
    },
    priority2_todos: function() {
      return this.todos.filter(todo => todo.priority_id === 2);
    },
    priority3_todos: function() {
      return this.todos.filter(todo => todo.priority_id === 3);
    },
    priority4_todos: function() {
      return this.todos.filter(todo => todo.priority_id === 4);
    }
},
  created: function() {
    this.getTodos();
    this.getPrioriryMaster();
  }
};
</script>
