<template>
  <div>
    <div class="container">
      <h2>Add Student</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Student
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Student List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addStudent">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="student.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="student.email"
              />
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input
                type="text"
                class="form-control"
                v-model="student.mobile"
              />
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" v-model="student.gender">
                <option value="">Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Other</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import { config } from "../config";

export default {
  name: "AddStudent",
  data() {
    return {
      student: {},
    };
  },
  methods: {
    addStudent() {
      this.axios.post(`${config.apiBaseUrl}/students`, this.student)
        .then(response => {
          this.$router.push({ name: "home" })
        })
        .catch(err => {
          console.log(err);
          throw err;
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>
