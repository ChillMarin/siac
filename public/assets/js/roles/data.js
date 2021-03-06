const user_roles = {
    cardiologist: {
        patient_management_access: {
            access: 1,
            sections: [
                {
                    name: 'Pacientes',
                    page: 'patients',
                    permissions: {
                        create: 1,
                        read: 1,
                        update: 1,
                        delete: 1,
                    }
                },
                {
                    name: 'Citas',
                    page: 'appointments',
                    permissions: {
                        create: 1,
                        read: 1,
                        update: 1,
                        delete: 1,
                    }
                }
            ]
        },
        calculations_and_algorithms_access: {
            access: 1,
        },
        patient_material_access: {
            access: 1,
            sections: [
                {
                    name: 'Materiales para pacientes',
                    page: 'patients',
                    permissions: {
                        create: 1,
                        read: 1,
                        delete: 1,
                    }
                },
                {
                    name: 'Plantillas',
                    page: 'templates',
                    permissions: {
                        create: 1,
                        read: 1,
                        delete: 1,
                    }
                }
            ]
        },
        notifications_access: {
            access: 1,
            publish: 1,
        },
    },
    nurse: {
        patient_management_access: {
            access: 1,
            sections: [
                {
                    name: 'Pacientes',
                    page: 'patients',
                    permissions: {
                        create: 1,
                        read: 1,
                        update: 1,
                        delete: 0,
                    }
                },
                {
                    name: 'Citas',
                    page: 'appointments',
                    permissions: {
                        create: 1,
                        read: 1,
                        update: 1,
                        delete: 1,
                    }
                }
            ]
        },
        calculations_and_algorithms_access: {
            access: 0,
        },
        patient_material_access: {
            access: 1,
            sections: [
                {
                    name: 'Materiales para pacientes',
                    page: 'patients',
                    permissions: {
                        create: 1,
                        read: 1,
                        delete: 1,
                    }
                },
                {
                    name: 'Plantillas',
                    page: 'templates',
                    permissions: {
                        create: 0,
                        read: 1,
                        delete: 0,
                    }
                }
            ]
        },
        notifications_access: {
            access: 1,
            publish: 1,
        },
    },
    secretary: {
        patient_management_access: {
            access: 1,
            sections: [
                {
                    name: 'Pacientes',
                    page: 'patients',
                    permissions: {
                        create: 0,
                        read: 1,
                        update: 0,
                        delete: 0,
                    }
                },
                {
                    name: 'Citas',
                    page: 'appointments',
                    permissions: {
                        create: 1,
                        read: 1,
                        update: 1,
                        delete: 1,
                    }
                }
            ]
        },
        calculations_and_algorithms_access: {
            access: 0,
        },
        patient_material_access: {
            access: 1,
            sections: [
                {
                    name: 'Materiales para pacientes',
                    page: 'patients',
                    permissions: {
                        create: 0,
                        read: 0,
                        delete: 0,
                    }
                },
                {
                    name: 'Plantillas',
                    page: 'templates',
                    permissions: {
                        create: 0,
                        read: 0,
                        delete: 0,
                    }
                }
            ]
        },
        notifications_access: {
            access: 1,
            publish: 0,
        },
    },
}