<script setup>
import { ref } from 'vue';
import { onMounted } from 'vue';
let url = "http://localhost/55-17-national-competition/practice2/C9/back-end/cors.php";

onMounted(() => {
  console.log('App mounted');
  $.ajax({
    url: url + "?call=connect",
    type: 'GET',
    success: function (data) {
      console.log('Data received:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error occurred:', status, error);
    }
  });
})
const sendGetRequset = () => {
  console.log('GET request sent');
  $.ajax({
    url: url,
    type: 'GET',
    success: function (data) {
      console.log('Data received:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error occurred:', status, error);
    }
  });
}
const sendPostRequset = () => {
  console.log('POST request sent');
  $.ajax({
    url: url,
    type: 'POST',
    data: {
      data1: "test",
      data2: 1
    },
    success: function (data) {
      console.log('Data received:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error occurred:', status, error);
    }
  });
}
const sendPutRequset = () => {
  console.log('PUT request sent');
  $.ajax({
    url: url,
    type: 'PUT',
    data: {
      data1: "test",
      data2: 1
    },
    success: function (data) {
      console.log('Data received:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error occurred:', status, error);
    }
  });
}
const sendDeleteRequset = () => {
  console.log('DELETE request sent');
  $.ajax({
    url: url,
    type: 'DELETE',
    data: {
      data1: "test",
      data2: 1
    },
    success: function (data) {
      console.log('Data received:', data);
    },
    error: function (xhr, status, error) {
      console.error('Error occurred:', status, error);
    }
  });
}

</script>

<template>
  <div>
    <button class="btn btn-primary" @click="sendGetRequset">GET</button>
    <button class="btn btn-primary" @click="sendPostRequset">POST</button>
    <button class="btn btn-primary" @click="sendPutRequset">PUT</button>
    <button class="btn btn-primary" @click="sendDeleteRequset">DELETE</button>
  </div>
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}

.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
