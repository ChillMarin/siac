<v-tabs class="patient-tabs" v-model="view_comparison_tab_upcm" show-arrows fixed-tabs>

    <template v-for="tab in tabsComparison">
        <v-tab class="font-weight-bold" :href="'#'+tab.id" >
            {{tab.name}}
        </v-tab>
    </template>

</v-tabs>
<v-tabs-items v-model="view_comparison_tab_upcm">
    <v-tab-item v-for="tab in tabsComparison" transition="scroll-y-reverse-transition" :value="tab.id">
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_CPA'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row>
                        <v-col cols="12" md="12">
                            <h4>Mi UPCM</h4>
                        </v-col>
                        <v-col cols="12" md="12" v-show="!statistics.chart.loading">
                            <h4 class="d-block text-h4 text-center">Mensual</h4>
                            <line-chart ref="monthly_chart" :chartData="statistics.chart.monthly_data"></line-chart>
                        </v-col>
                        
                        <v-col cols="12" md="12" v-show="!statistics.chart.loading">
                            <h4 class="d-block text-h4 text-center">Semanal</h4>
                            <line-chart ref="weekly_chart" :chartData="statistics.chart.weekly_data"></line-chart>
                        </v-col>

                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row>
                        <v-col cols="12" md="12">
                            <h4>{{upcm_selected.upcm_name}}</h4>
                        </v-col>
                        <v-col cols="12" md="12" v-show="!statisticsComparison.chart.loading">
                            <h4 class="d-block text-h4 text-center">Mensual</h4>
                            <line-chart ref="monthly_chart" :chartData="statisticsComparison.chart.monthly_data"></line-chart>
                        </v-col>
                        
                        <v-col cols="12" md="12" v-show="!statisticsComparison.chart.loading">
                            <h4 class="d-block text-h4 text-center">Semanal</h4>
                            <line-chart ref="weekly_chart" :chartData="statisticsComparison.chart.weekly_data"></line-chart>
                        </v-col>

                    </v-row>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_general'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                My UPCM
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-account-group" border="left" dark prominent>
                                Pacientes: {{ patients.length }}
                                <br>
                                Edad promedio: {{ Math.round((statistics.male.age_average + statistics.female.age_average ) / ((statistics.female.total_patients > 0 ? 1 : 0) + (statistics.male.total_patients > 0 ? 1 : 0) )) }} años
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-gender-female" border="left" dark prominent>
                                Pacientes femeninos: {{ statistics.female.total_patients }}
                                <br>
                                Edad promedio: {{ statistics.female.age_average }} años
                            </v-alert>
                        </v-col>
                        
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="primary" icon="mdi-gender-male" border="left" dark prominent>
                                Pacientes masculinos: {{ statistics.male.total_patients }}
                                <br>
                                Edad promedio: {{ statistics.male.age_average }} años
                            </v-alert>
                        </v-col>

                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                {{upcm_selected.upcm_name}}
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-account-group" border="left" dark prominent>
                                Pacientes: {{ patients.length }}
                                <br>
                                Edad promedio: {{ Math.round((statisticsComparison.male.age_average + statisticsComparison.female.age_average ) / ((statistics.female.total_patients > 0 ? 1 : 0) + (statistics.male.total_patients > 0 ? 1 : 0) )) }} años
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-gender-female" border="left" dark prominent>
                                Pacientes femeninos: {{ statisticsComparison.female.total_patients }}
                                <br>
                                Edad promedio: {{ statisticsComparison.female.age_average }} años
                            </v-alert>
                        </v-col>
                        
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="primary" icon="mdi-gender-male" border="left" dark prominent>
                                Pacientes masculinos: {{ statisticsComparison.male.total_patients }}
                                <br>
                                Edad promedio: {{ statisticsComparison.male.age_average }} años
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_antro'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                My UPCM
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                Cintura abdominal:
                                <template v-if="!statistics.anthropometry.loading">
                                    {{ statistics.anthropometry.abdominal_waist }} cm
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                IMC:
                                <template v-if="!statistics.anthropometry.loading">
                                    {{ statistics.anthropometry.bmi }} kg/m<sup>2</sup>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                SC:
                                <template v-if="!statistics.anthropometry.loading">
                                    {{ statistics.anthropometry.cs }} m<sup>2</sup>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                {{upcm_selected.upcm_name}}
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                Cintura abdominal:
                                <template v-if="!statisticsComparison.anthropometry.loading">
                                    {{ statisticsComparison.anthropometry.abdominal_waist }} cm
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                IMC:
                                <template v-if="!statisticsComparison.anthropometry.loading">
                                    {{ statisticsComparison.anthropometry.bmi }} kg/m<sup>2</sup>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="secondary" icon="mdi-information" border="left" outlined prominent>
                                Promedio
                                <br>
                                SC:
                                <template v-if="!statisticsComparison.anthropometry.loading">
                                    {{ statisticsComparison.anthropometry.cs }} m<sup>2</sup>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_EDV'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                My UPCM
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Tabaquismo</b>
                                <template v-if="!statistics.life_style.loading">
                                    <br>
                                    Sí: {{ statistics.life_style.smoking.active }}
                                    <br>
                                    No: {{ statistics.life_style.smoking.inactive }}
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Consumo <br> de alcohol</b>
                                <template v-if="!statistics.life_style.loading">
                                    <br>
                                    Sí: {{ statistics.life_style.alcohol_consumption.active }}
                                    <br>
                                    No: {{ statistics.life_style.alcohol_consumption.inactive }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>


                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Sedentarismo</b>
                                <template v-if="!statistics.life_style.loading">
                                    <br>
                                    Sí: {{ statistics.life_style.sedentary.active }}
                                    <br>
                                    No: {{ statistics.life_style.sedentary.inactive }}
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>


                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Ejercicios físico</b>
                                <template v-if="!statistics.life_style.loading">
                                    <br>
                                    Aeróbicos:
                                    {{ statistics.life_style.exercises.aerobics }}
                                    <br>
                                    Resistencia: {{ statistics.life_style.exercises.resistance }}
                                    <br>
                                    Minutos semanal: {{ statistics.life_style.exercises.time_weekly_avg }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                {{upcm_selected.upcm_name}}
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Tabaquismo</b>
                                <template v-if="!statisticsComparison.life_style.loading">
                                    <br>
                                    Sí: {{ statisticsComparison.life_style.smoking.active }}
                                    <br>
                                    No: {{ statisticsComparison.life_style.smoking.inactive }}
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Consumo <br> de alcohol</b>
                                <template v-if="!statisticsComparison.life_style.loading">
                                    <br>
                                    Sí: {{ statisticsComparison.life_style.alcohol_consumption.active }}
                                    <br>
                                    No: {{ statisticsComparison.life_style.alcohol_consumption.inactive }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>


                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Sedentarismo</b>
                                <template v-if="!statisticsComparison.life_style.loading">
                                    <br>
                                    Sí: {{ statisticsComparison.life_style.sedentary.active }}
                                    <br>
                                    No: {{ statisticsComparison.life_style.sedentary.inactive }}
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>


                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="pink" icon="mdi-account-heart" border="left" outlined prominent>
                                <b>Ejercicios físico</b>
                                <template v-if="!statisticsComparison.life_style.loading">
                                    <br>
                                    Aeróbicos:
                                    {{ statisticsComparison.life_style.exercises.aerobics }}
                                    <br>
                                    Resistencia: {{ statisticsComparison.life_style.exercises.resistance }}
                                    <br>
                                    Minutos semanal: {{ statisticsComparison.life_style.exercises.time_weekly_avg }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="pink" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_diag'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                My UPCM
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Hipertensión arterial</b>
                                <template v-if="!statistics.diseases.loading">
                                    <br>
                                    Total: {{ statistics.diseases.hta.controlled + statistics.diseases.hta.no_controlled }}
                                    <br>
                                    Controlados: {{ statistics.diseases.hta.controlled }}
                                    <br>
                                    No controlados: {{ statistics.diseases.hta.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Diabetes</b>
                                <template v-if="!statistics.diseases.loading">
                                    <br>
                                    Total: {{ statistics.diseases.dmt2.controlled + statistics.diseases.dmt2.no_controlled }}
                                    <br>
                                    Controlados: {{ statistics.diseases.dmt2.controlled }}
                                    <br>
                                    No controlados: {{ statistics.diseases.dmt2.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Dislipidemia</b>
                                <template v-if="!statistics.diseases.loading">
                                    <br>
                                    Total: {{ statistics.diseases.dyslipidemia.controlled +statistics.diseases.dyslipidemia.no_controlled }}
                                    <br>
                                    Controlados: {{ statistics.diseases.dyslipidemia.controlled }}
                                    <br>
                                    No controlados: {{ statistics.diseases.dyslipidemia.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Obesidad</b>
                                <template v-if="!statistics.diseases.loading">
                                    <br>
                                    Total: {{ statistics.diseases.obesity.total }}
                                    <br>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12" v-if="1 == 2">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Fumadores</b>
                                <template v-if="!statistics.diseases.loading">
                                    <br>
                                    Total: {{ statistics.diseases.smoking }}
                                    <br>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                {{upcm_selected.upcm_name}}
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Hipertensión arterial</b>
                                <template v-if="!statisticsComparison.diseases.loading">
                                    <br>
                                    Total: {{ statisticsComparison.diseases.hta.controlled + statisticsComparison.diseases.hta.no_controlled }}
                                    <br>
                                    Controlados: {{ statisticsComparison.diseases.hta.controlled }}
                                    <br>
                                    No controlados: {{ statisticsComparison.diseases.hta.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Diabetes</b>
                                <template v-if="!statisticsComparison.diseases.loading">
                                    <br>
                                    Total: {{ statisticsComparison.diseases.dmt2.controlled + statisticsComparison.diseases.dmt2.no_controlled }}
                                    <br>
                                    Controlados: {{ statisticsComparison.diseases.dmt2.controlled }}
                                    <br>
                                    No controlados: {{ statisticsComparison.diseases.dmt2.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Dislipidemia</b>
                                <template v-if="!statisticsComparison.diseases.loading">
                                    <br>
                                    Total: {{ statisticsComparison.diseases.dyslipidemia.controlled +statisticsComparison.diseases.dyslipidemia.no_controlled }}
                                    <br>
                                    Controlados: {{ statisticsComparison.diseases.dyslipidemia.controlled }}
                                    <br>
                                    No controlados: {{ statisticsComparison.diseases.dyslipidemia.no_controlled }}
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Obesidad</b>
                                <template v-if="!statisticsComparison.diseases.loading">
                                    <br>
                                    Total: {{ statisticsComparison.diseases.obesity.total }}
                                    <br>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>

                        <v-col cols="12" md="12" lg="12" xl="12" v-if="1 == 2">
                            <v-alert color="info" icon="mdi-heart-pulse" border="left" outlined prominent>
                                <b>Fumadores</b>
                                <template v-if="!statisticsComparison.diseases.loading">
                                    <br>
                                    Total: {{ statisticsComparison.diseases.smoking }}
                                    <br>
                                    <br>
                                    <br>
                                </template>
                                <template v-else>
                                    <br>
                                    <v-btn color="info" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid v-if="view_comparison_tab_upcm == 'upcm_PDV'">
            <v-row>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                My UPCM
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12" v-for="exam in statistics.laboratory_exam.items">
                            <v-alert color="secondary" icon="mdi-text-box-search" border="left" outlined prominent>
                                <b>{{ exam.name }}</b><template v-if="!statistics.laboratory_exam.loading">: {{ exam.total + ' ' + exam.nomenclature }}</template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row class="d-flex justify-center">
                        <v-col cols="12">
                            <h4>
                                {{upcm_selected.upcm_name}}
                            </h4>
                        </v-col>
                        <v-col cols="12" md="12" lg="12" xl="12" v-for="exam in statisticsComparison.laboratory_exam.items">
                            <v-alert color="secondary" icon="mdi-text-box-search" border="left" outlined prominent>
                                <b>{{ exam.name }}</b><template v-if="!statisticsComparison.laboratory_exam.loading">: {{ exam.total + ' ' + exam.nomenclature }}</template>
                                <template v-else>
                                    <br>
                                    <v-btn color="secondary" :loading="true" text small fab></v-btn>
                                </template>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-tab-item>    
</v-tabs-items>