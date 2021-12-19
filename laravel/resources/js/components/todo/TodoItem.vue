<template>
  <div>
    <h1>{{priotiry.name}}</h1>
    <input type="text" v-model="addData">
    <input type="button" value="追加" @click="addTodo">
    <div v-for="todoData in todoDatas" :key="todoData.id">
      <input type="text" v-model="todoData.content">
      <!-- <input type="button" value="更新" @click="updateTodo(todoData)">
      <input type="button" value="削除" @click="deleteTodo(todoData)"> -->
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      todoDatas: Array,
      priotiry: Object,
    },
    data: function() {
      return {
        addData: "",
      }
    },
    methods: {
      addTodo: function() {
        this.$emit('add-button-click',this.addData,this.priotiry.id);
      }
    }
  };
</script>
