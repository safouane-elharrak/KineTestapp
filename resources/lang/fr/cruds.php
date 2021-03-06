<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Catégories',
        'title_singular' => 'Catégory',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'catergory_name'        => 'Nom',
            'catergory_name_helper' => ' ',
            'reference'             => 'Reference',
            'reference_helper'      => ' ',
            'active'                => 'Active',
            'active_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'service' => [
        'title'          => 'Services',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'service_name'             => 'Nom',
            'service_name_helper'      => ' ',
            'service_reference'        => 'Réference',
            'service_reference_helper' => ' ',
            'service_active'           => 'Active',
            'service_active_helper'    => ' ',
            'service_price'            => 'Prix',
            'service_price_helper'     => ' ',
            'service_min_price'        => 'Prix Min',
            'service_min_price_helper' => ' ',
            'service_max_price'        => 'Prix Max',
            'service_max_price_helper' => ' ',
            'category'                 => 'Catégorie',
            'category_helper'          => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'patient' => [
        'title'          => 'Gestion des patients',
        'title_singular' => 'Gestion des patient',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'patient_gender'            => 'Genre',
            'patient_gender_helper'     => ' ',
            'patient_fname'             => 'Prénom',
            'patient_fname_helper'      => ' ',
            'patient_lname'             => 'Nom',
            'patient_lname_helper'      => ' ',
            'patient_cin'               => 'CIN',
            'patient_cin_helper'        => ' ',
            'patient_birthday'          => 'Date de naissance',
            'patient_birthday_helper'   => ' ',
            'patient_mobile'            => 'Mobile',
            'patient_mobile_helper'     => ' ',
            'patient_email'             => 'Email',
            'patient_email_helper'      => ' ',
            'patient_type'              => 'Type',
            'patient_type_helper'       => ' ',
            'patient_insurance'         => 'Assurance',
            'patient_insurance_helper'  => ' ',
            'patient_profession'        => 'Profession',
            'patient_profession_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'patient_note'              => 'Note supplimentaire',
            'patient_note_helper'       => ' ',
        ],
    ],
    'employe' => [
        'title'          => 'Personel',
        'title_singular' => 'Personel',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'employe_fname'           => 'Prénom',
            'employe_fname_helper'    => ' ',
            'employe_lname'           => 'Employe Lname',
            'employe_lname_helper'    => ' ',
            'employe_cin'             => 'Employe Cin',
            'employe_cin_helper'      => ' ',
            'cin_file'                => 'CIN FILE',
            'cin_file_helper'         => ' ',
            'employe_cnss'            => 'Matriculation CNSS',
            'employe_cnss_helper'     => ' ',
            'employe_birthday'        => 'Date de naissance',
            'employe_birthday_helper' => ' ',
            'employe_orgin'           => 'Ville d\'origine',
            'employe_orgin_helper'    => ' ',
            'employe_salary'          => 'Salaire',
            'employe_salary_helper'   => ' ',
            'employe_contract'        => 'Type de contrat',
            'employe_contract_helper' => ' ',
            'employe_start'           => 'Date de début de travail',
            'employe_start_helper'    => ' ',
            'employe_end'             => 'Date de fin de travail',
            'employe_end_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'session' => [
        'title'          => 'Séance',
        'title_singular' => 'Séance',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'session_date'            => 'Date de séance',
            'session_date_helper'     => ' ',
            'patient'                 => 'Patient',
            'patient_helper'          => ' ',
            'session_type'            => 'Type',
            'session_type_helper'     => ' ',
            'session_location'        => 'Local',
            'session_location_helper' => ' ',
            'user'                    => 'Utilisateur',
            'user_helper'             => ' ',
            'employe'                 => 'Personel',
            'employe_helper'          => ' ',
            'session_total'           => 'Prix Total',
            'session_total_helper'    => ' ',
            'session_status'          => 'Status',
            'session_status_helper'   => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'sessionLine' => [
        'title'          => 'Lignes de séances',
        'title_singular' => 'Lignes de séance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'session'           => 'Séance',
            'session_helper'    => ' ',
            'service'           => 'Service',
            'service_helper'    => ' ',
            'detail'            => 'Detail',
            'detail_helper'     => ' ',
            'quantity'          => 'Quantité',
            'quantity_helper'   => ' ',
            'price'             => 'Prix',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Paiement',
        'title_singular' => 'Paiement',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'payement_method'        => 'Méthode de paiement',
            'payement_method_helper' => ' ',
            'payment_date'           => 'Date de paimenet',
            'payment_date_helper'    => ' ',
            'payment_ref'            => 'Réference de paiement',
            'payment_ref_helper'     => ' ',
            'note'                   => 'Note',
            'note_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'payement_amount'        => 'Montant',
            'payement_amount_helper' => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Facturation',
        'title_singular' => 'Facturation',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'invoice_client_name'          => 'Nom de client',
            'invoice_client_name_helper'   => ' ',
            'invoice_cin'                  => 'CIN',
            'invoice_cin_helper'           => ' ',
            'invoice_ice'                  => 'ICE',
            'invoice_ice_helper'           => ' ',
            'invoice_address'              => 'Adresse',
            'invoice_address_helper'       => ' ',
            'invoice_date'                 => 'Date',
            'invoice_date_helper'          => ' ',
            'invoice_ttc'                  => 'TTC',
            'invoice_ttc_helper'           => ' ',
            'invoice_ht'                   => 'HT',
            'invoice_ht_helper'            => ' ',
            'invoice_tva'                  => 'TVA',
            'invoice_tva_helper'           => ' ',
            'invoice_discount'             => 'Remise',
            'invoice_discount_helper'      => ' ',
            'invoice_discount_type'        => 'Type de remise',
            'invoice_discount_type_helper' => ' ',
            'invoice_reason'               => 'Raison de facturation',
            'invoice_reason_helper'        => ' ',
            'invoice_status'               => 'Etat',
            'invoice_status_helper'        => ' ',
            'service'                      => 'Service',
            'service_helper'               => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'appointment' => [
        'title'          => 'RDV',
        'title_singular' => 'RDV',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'patient'                       => 'Patient',
            'patient_helper'                => ' ',
            'appointment_date'              => 'Date de rdv',
            'appointment_date_helper'       => ' ',
/**/            'start_time'         => 'heure de début',
'start_time_helper'  => '',
'finish_time'        => 'heure de fin',
'finish_time_helper' => '', /**/
            'appointment_type'              => 'Type',
            'appointment_type_helper'       => ' ',
            'appointment_status'            => 'Statut',
            'appointment_status_helper'     => ' ',
            'appointment_created_by'        => 'Crée par',
            'appointment_created_by_helper' => ' ',
            'appointment_update_by'         => 'Mise à jour par',
            'appointment_update_by_helper'  => ' ',
            'appointment_note'              => 'Note',
            'appointment_note_helper'       => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
        ],
    ],
    'settingMenu' => [
        'title'          => 'Parametrage',
        'title_singular' => 'Parametrage',
    ],
];
