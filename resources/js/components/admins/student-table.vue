<template>
  <v-layout>
    <v-toolbar color="white" flat fixed>
      <v-btn style="text-decoration:none;" href="/admin/home" icon light>
        <v-icon color="grey darken-2">arrow_back</v-icon>
      </v-btn>
    </v-toolbar>
    <div class="mt-5 container">
      <div class="row justify-content-center">
        <div class="col-sm">
          <div class="card">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Student ID</th>
                  <th scope="col">Bus ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody v-for="student in students" :key="student.id">
                <tr>
                  <th scope="row">{{ student.stu_id }}</th>
                  <td>{{ student.bus_id }}</td>
                  <td>{{ student.fname }}</td>
                  <td>{{ student.lname }}</td>
                  <td>{{ student.email }}</td>
                  <td>
                    <button v-on:click="clickStudent(student)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>


                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Student No.: {{stu_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">

                                <input class="mb-3 form-control" type="text" placeholder="Student ID" v-model="stu_id">
                                <input class="mb-3 form-control" type="text" placeholder="Bus ID" v-model="bus_id">
                                <input class="mb-3 form-control" type="text" placeholder="First Name" v-model="fname">
                                <input class="mb-3 form-control" type="text" placeholder="Last Name" v-model="lname">
                                <input class="mb-3 form-control" type="text" placeholder="Email Address" v-model="email">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" v-on:click="saveStudent()">Save changes</button>
                                </div>
                                </div>
                                </div>
                                </div>

                    <button v-on:click="clickStudent(student)" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Delete</button>

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Student No.: {{stu_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you sure?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete Student</button>
                                </div>
                                </div>
                                </div>
                                </div>

                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </v-layout>
</template>

<script>
export default {
  props: {
    admin: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
        students: [],
        stu_id: null,
        bus_id: null,
        fname: null,
        lname: null,
        email: null
    };
  },

  created() {

    this.fetchStudents();

  },

  methods: {

    fetchStudents() {
      axios.get("/admin/showstutable").then(response => {
        this.students = response.data.students;

      });
    },

    clickStudent: function (student) {
    return (this.stu_id = student.stu_id, this.bus_id = student.bus_id, this.fname = student.fname, this.lname = student.lname, this.email = student.email);
    },

    saveStudent () {
   axios.put("/admin/savestudent", {stu_id: this.stu_id, bus_id: this.bus_id, fname: this.fname, lname: this.lname, email: this.email}).then(response => {});
    window.location.reload()
    }

  }
};
</script>
