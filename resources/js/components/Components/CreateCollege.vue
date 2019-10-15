<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#addCollege"
        >
            เพิ่มมหาลัย
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="addCollege"
            tabindex="-1"
            role="dialog"
            aria-labelledby="addCollegeLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            เพิ่มมหาลัย
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
                        <label>ชื่อมหาลัย</label>
                        <input
                            v-model="collegeName"
                            type="text"
                            class="form-control"
                            placeholder="กรุณากรอกชื่อมหาลัย"
                        />
                    </div>
                    <div class="modal-footer">
                        <button
                            @click="addCollege()"
                            class="btn btn-success form-control"
                        >
                            เพิ่มมหาลัย
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
                    <th scope="col">ชื่อมหาลัย</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(show, index) in collegeList">
                    <td>{{ index + 1 }}</td>
                    <td>{{ show.name }}</td>
                    <td>
                        <button
                            @click="deleteCollege(show.id)"
                            class="btn btn-danger"
                        >
                            ลบ
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getCollegeList();
    },
    data() {
        return {
            collegeName: null,
            collegeList: []
        };
    },
    methods: {
        getCollegeList() {
            axios.get("/api/college").then(response => {
                this.collegeList = response.data;
            });
        },
        addCollege() {
            axios
                .post("/api/college", {
                    name: this.collegeName
                })
                .then(response => {
                    this.collegeList = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        deleteCollege(id) {
            axios.delete("/api/college/" + id).then(response => {
                this.collegeList = response.data;
            });
        }
    }
};
</script>
