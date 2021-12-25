<template>
  <div>
    <div v-for="error in errors" :key="error.index">
      {{error}}
    </div>
    <!-- 第1領域 -->
    <TodoItem
      @add-button-click="addTodo"
      @update-button-click="updateTodo"
      @delete-button-click="deleteTodo"
      :todoDatas="priority1_todos"
      :priotiry="priorities[0]"
      accordionId='accordionOne'>
    </TodoItem>
    <!-- 第2領域 -->
    <TodoItem
      @add-button-click="addTodo"
      @update-button-click="updateTodo"
      @delete-button-click="deleteTodo"
      :todoDatas="priority2_todos"
      :priotiry="priorities[1]"
      accordionId='accordionTwe'>
    </TodoItem>
    <!-- 第3領域 -->
    <TodoItem
      @add-button-click="addTodo"
      @update-button-click="updateTodo"
      @delete-button-click="deleteTodo"
      :todoDatas="priority3_todos"
      :priotiry="priorities[2]"
      accordionId='accordionThree'>
    </TodoItem>
    <!-- 第4領域 -->
    <TodoItem id="hogw"
      @add-button-click="addTodo"
      @update-button-click="updateTodo"
      @delete-button-click="deleteTodo"
      :todoDatas="priority4_todos"
      :priotiry="priorities[3]"
      accordionId='accordionFour'>
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
      errors: {
        content: "",
        deadline_date: "",
      }
    };
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
      
      axios.post('api/todo', {
        content: todo_content,
        priority_id: priorityid,
      })
      .then( response => {
        this.todos.unshift(response.data);
        alert("追加しました");
      })
      .catch( error => {
        if (error.response.data.status === 400) {
          var error_datas = error.response.data.errors;
          this.errors.content = error_datas.content ? error_datas.content[0] : ""
          this.errors.deadline_date = error_datas.deadline_date ? error_datas.deadline_date[0] : ""
        }
      });
    },
    // 更新
    updateTodo(todo) {
      axios.put('api/todo/' + todo.id, {
        content: todo.content,
        deadline_date: todo.deadline_date,
        priority_id: todo.priority_id
      })
      .then(response => {
        alert("更新しました。")
      })
      .catch( error => {
        if (error.response.data.status === 400) {
          var error_datas = error.response.data.errors;
          this.errors.content = error_datas.content ? error_datas.content[0] : ""
          this.errors.deadline_date = error_datas.deadline_date ? error_datas.deadline_date[0] : ""
        }
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
        alert("削除に失敗しました。");
      });
    }
  },
  created: function() {
    this.getTodos();
    this.getPrioriryMaster();
  }
};
</script>
