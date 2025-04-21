<?php

namespace Sprint\Migration;

class BD583_20240916145359 extends Version
{
    protected $description = "Создаёт группы пользователей для воронки \"Подключение к мониторингу\"";

    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up(): bool
    {
        $helper = $this->getHelperManager();

        $helper->UserGroup()->saveGroup('MONITORING_CONNECTION_TECHNICAL_SPECIALIST', [
            'ACTIVE' => 'Y',
            'C_SORT' => '100',
            'ANONYMOUS' => 'N',
            'NAME' => 'Подключение к мониторингу. Технический специалист',
            'DESCRIPTION' => '',
        ]);
        $helper->UserGroup()->saveGroup('MONITORING_CONNECTION_HEAD_OF_SALES_DEPARTAMENT', [
            'ACTIVE' => 'Y',
            'C_SORT' => '100',
            'ANONYMOUS' => 'N',
            'NAME' => 'Подключение к мониторингу. Руководитель отдела продаж',
            'DESCRIPTION' => '',
        ]);
        $helper->UserGroup()->saveGroup('MONITORING_CONNECTION_SALES_DEPARTMENT_MANAGER', [
            'ACTIVE' => 'Y',
            'C_SORT' => '100',
            'ANONYMOUS' => 'N',
            'NAME' => 'Подключение к мониторингу. Менеджер отдела продаж',
            'DESCRIPTION' => '',
        ]);
        return true;
    }

    public function down(): bool
    {
        $helper = $this->getHelperManager();

        $helper->UserGroup()->deleteGroup('MONITORING_CONNECTION_TECHNICAL_SPECIALIST');
        $helper->UserGroup()->deleteGroup('MONITORING_CONNECTION_HEAD_OF_SALES_DEPARTAMENT');
        $helper->UserGroup()->deleteGroup('MONITORING_CONNECTION_SALES_DEPARTMENT_MANAGER');
        return true;
    }
}
