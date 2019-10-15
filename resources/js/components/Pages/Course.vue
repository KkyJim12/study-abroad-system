<template>
    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>คอร์สเรียน</h1>
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addCourse"
                >
                    เพิ่มคอร์สเรียน
                </button>

                <!-- Modal -->
                <div
                    class="modal fade"
                    id="addCourse"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="addCourseLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCourseLabel">
                                    เพิ่มคอร์สเรียน
                                </h5>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>ชื่อคอร์ส</label>
                                <input
                                    v-model="courseName"
                                    type="text"
                                    class="form-control"
                                    placeholder="กรุณากรอกชื่อคอร์สเรียน"
                                />
                            </div>
                            <div class="modal-footer">
                                <button
                                    @click="addCourse()"
                                    class="btn btn-success form-control"
                                >
                                    เพิ่มคอร์สเรียน
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อคอร์สเรียน</th>
                            <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(show, index) in courseList">
                            <td>{{ index + 1 }}</td>
                            <td>{{ show.name }}</td>
                            <td>
                                <button
                                    @click="deleteCourse(show.id)"
                                    class="btn btn-danger"
                                >
                                    ลบ
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getCourseList();
    },
    data() {
        return {
            courseName: null,
            courseList: []
        };
    },
    methods: {
        getCourseList() {
            axios.get("/api/course").then(response => {
                this.courseList = response.data;
            });
        },
        addCourse() {
            axios
                .post("/api/course", {
                    name: this.courseName
                })
                .then(response => {
                    this.courseList = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        deleteCourse(id) {
            axios.delete("/api/course/" + id).then(response => {
                this.courseList = response.data;
            });
        }
    }
};
</script>
