<template>
    <div class="row align-items-center justify-content-center screen-height">
        <div class="col-xs-10 col-sm-10 col-md-6 col-lg-5 col-xl-5 form-border">
            <h1>Insulation Calculator</h1>
            <Form @submit="submitForm" class="mb-3">
                <div class="mb-3">
                    <label for="length" class="form-label"
                        >Length (feet):</label
                    >
                    <Field
                        class="form-control rounded-1 text-white"
                        type="number"
                        id="length"
                        name="length"
                        v-model="insulation.length"
                        required
                        rules="required|number"
                    />
                    <ErrorMessage class="text-danger" name="length" />
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label">Width (feet):</label>
                    <Field
                        class="form-control rounded-1 text-white"
                        type="number"
                        id="width"
                        name="width"
                        v-model="insulation.width"
                        required
                        rules="required|number"
                    />
                    <ErrorMessage class="text-danger" name="width" />
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label"
                        >Height (feet):</label
                    >
                    <Field
                        class="form-control rounded-1 text-white"
                        type="number"
                        id="height"
                        name="height"
                        v-model="insulation.height"
                        required
                        rules="required|number"
                    />
                    <ErrorMessage class="text-danger" name="height" />
                </div>
                <div class="mb-3">
                    <label for="slope" class="form-label"
                        >Slope (degrees | optional):</label
                    >
                    <input
                        class="form-control rounded-1 text-white"
                        type="number"
                        id="slope"
                        v-model="insulation.slope"
                    />
                </div>
                <div class="mb-3">
                    <label for="rValue" class="form-label">R-Value:</label>
                    <select
                        id="rValue"
                        name="rValue"
                        class="form-select rounded-1 text-white"
                        v-model="insulation.rValue"
                    >
                        <option selected value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="38">38</option>
                    </select>
                </div>
                <button
                    type="submit"
                    class="btn btn-primary rounded-1 text-white"
                >
                    Calculate
                </button>
            </Form>
            <div
                v-show="insulationVolume > 0"
                class="alert alert-info rounded-1"
                role="alert"
            >
                Your insulation volume is {{ insulationVolume }} cubic feet.
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { Form, Field, ErrorMessage } from "vee-validate";

export default {
    components: {
        Form,
        Field,
        ErrorMessage,
    },
    data() {
        return {
            insulation: {
                email: "",
                length: 1,
                width: 1,
                height: 1,
                slope: 0,
                rValue: 10,
            },
            insulationVolume: 0,
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post(
                    "/api/calculate",
                    this.insulation
                );
                if (response.data.success) {
                    this.insulationVolume = response.data.data;
                    setTimeout(() => (this.insulationVolume = 0), 4000);
                }
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
