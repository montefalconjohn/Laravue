<template>
  <div>
    <div class="container">
      <h2>Update Student</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Student
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Student List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateStudent">
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
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import { config } from "../config";

export default {
  name: "UpdateStudent",
  data() {
    return {
      student: {},
    };
  },
  created() {
    this.axios.get(`${config.apiBaseUrl}/students/${this.$route.params.id}`)
      .then(response => {
        const {data} = response.data;
        const {attributes} = data;
        this.student = {
          id: data.id,
          name: attributes.name,
          email: attributes.email,
          mobile: attributes.mobile,
          gender: attributes.gender
        };
      });
  },
  methods: {
    updateStudent() {
      this.axios.patch(
          `http://localhost:8000/api/students/${this.$route.params.id}`,
          this.student
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>
           