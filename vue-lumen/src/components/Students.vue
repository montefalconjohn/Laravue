<template>
  <students-table :students="students" @delete-student="deleteStudent"/>
</template>
 
<script>
import StudentsTable from './StudentsTable.vue';
import { config } from "../config";

export default {
  components: { StudentsTable },
  name: "Students",
  data() {
    return {
      students: []
    };
  },
  created() {
    this.fetchStudents();
  },
  methods: {
    deleteStudent(id) {
      this.axios.delete(`${config.apiBaseUrl}/students/${id}`)
        .then(response => {
          // Another approach in updating
          // let i = this.students.map((data) => data.id).indexOf(id);
          // this.students.splice(i, 1);
          this.students = this.students.filter(student => student.id !== id);
        });
    },
    fetchStudents() {
      this.axios.get(`${config.apiBaseUrl}/students`)
        .then((response) => {
          const {data} = response.data;
          this.students = data.map(student => ({ 
            id: student.id,
            name: student.attributes.name,
            email: student.attributes.email,
            mobile: student.attributes.mobile,
            gender: student.attributes.gender
           }));
        })
        .catch(err => {
          console.log(err);
        })
    }
  }
};
</script>
                