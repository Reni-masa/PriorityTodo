<template>

  <div class="accordion-item" :class="$style.title">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#' + accordionId" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        {{priotiry.name}}
      </button>
    </h2>
    <div :id="accordionId" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="input-group mb-3">
        <input type="text" v-model="addData" class="form-control" placeholder="input todo..">
        <button class="btn btn-outline-secondary" @click="addTodo()" type="button">追加</button>
      </div>
      <div v-for="todoData in todoDatas" :key="todoData.id">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="必須入力" v-model="todoData.content">
          <button class="btn btn-outline-secondary" type="button" @click="updateTodo(todoData)">更新</button>
          <button class="btn btn-outline-secondary" type="button" @click="deleteTodo(todoData)">削除</button>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    props: {
      todoDatas: Array,
      priotiry: Object,
      accordionId: String,
    },
    data: function() {
      return {
        addData: "",
      }
    },
    methods: {
      addTodo: function() {
        this.$emit('add-button-click',this.addData,this.priotiry.id);
        this.addData = "";
      },
      updateTodo: function(todoData) {
        this.$emit('update-button-click', todoData)
      },
      deleteTodo: function(todoData) {
        this.$emit('delete-button-click', todoData)
      }

    }
  };
</script>

<style module>
  .title {
    border: dashed 2px #5b8bd0;
    border-radius: 5px;
    padding: 3px;
  }
</style>