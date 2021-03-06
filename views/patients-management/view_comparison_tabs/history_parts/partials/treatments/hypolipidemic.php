<v-card class="px-4">
    <v-row class="mb-10" v-if="comparison.history.<?= $item ?>.hasOwnProperty('history_content')">
        <v-col cols="12">
            <h3 class="text-h5">HIPOLIPEMIANTES</h3>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.hypolipidemic.statins.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'statins'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'statins'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.has_secondary_effects">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacci??n:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.statins.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">EZT</h3>
                    <span class="black--text font-weight-bold">
                        <template v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.active">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.hypolipidemic.ezt.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'ezt'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'ezt'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.has_secondary_effects">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacci??n:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ezt.secondary_effects }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Fibratos</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.hypolipidemic.fibratos.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {daily_dosis: true, treatment: {group: 'hypolipidemic', treatment: 'fibratos'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {daily_dosis: true, treatment: {group: 'hypolipidemic', treatment: 'fibratos'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.has_secondary_effects">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacci??n:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.fibratos.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.hypolipidemic.omega3.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history',
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'omega3'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'omega3'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.has_secondary_effects">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacci??n:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.omega3.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">IPCSK9</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.hypolipidemic.ipcsk9.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'ipcsk9'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'hypolipidemic', treatment: 'ipcsk9'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.has_secondary_effects">
                            S??
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacci??n:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.hypolipidemic.ipcsk9.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="px-4 py-4" v-else>
        <p class="text-center">No se encontr?? informaci??n</p>
    </v-row>
</v-card>