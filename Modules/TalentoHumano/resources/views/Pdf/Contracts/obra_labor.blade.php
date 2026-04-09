<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pdf/contract.css') }}">
</head>

<style>
    
</style>

<body>
    <header>
        <table>
          <tr>
            <td style="padding: 0; font-weight: bold; border-color: #FF0000; border-width: 1px;" class="bordeinferior">
                <img src="{{ asset('images/logo_horizontal.png') }}">
            </td>
            <td class="negrita bordeinferior" style="font-size: 18px; border-color: #FF0000; border-width: 1px; text-align: center; font-weight: bold;">
                <span>COOPERATIVA DE ENTIDADES DE SALUD DE CÓRDOBA – COODESCOR – </span><br>
                <span>CONTRATO INDIVIDUAL DE TRABAJO POR LABOR CONTRATADA</span>
            </td>
          </tr>
        </table>
    </header>
    <footer style="border-color: #FF0000; border-width: 1px; text-align: right;" class="bordesuperior">
        <div style="font-size: 11px; text-align: right;">
            Página <span class="page-number"></span> de 5
        </div>
    </footer>
    
    <table style="border-collapse: separate; border-spacing: 0 15px; font-size: 15px;">
        <tr class="">
            <td style="width: 50%; text-align: left;"><strong>NOMBRE DEL EMPLEADOR:</strong></td>
            <td style="width: 50%; text-align: left;">COOPERATIVA DE ENTIDADES DE SALUD DE CÓRDOBA – COODESCOR –</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>NOMBRE DEL TRABAJADOR:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->full_name }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>DIRECCIÓN Y TELÉFONO:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->employee->address }} {{ $contract->employee->city }}, {{ $contract->employee->city }} <br>{{ $contract->employee->cel_phone }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>LUGAR Y FECHA DE NACIMIENTO:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->employee->city_birth }}, {{ optional($contract->employee->birth_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>NACIONALIDAD:</strong></td>
            <td style="width: 50%; text-align: left;">COLOMBIANA</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>CARGO A DESEMPEÑAR:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->position }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>SALARIO MENSUAL:</strong></td>
            <td style="width: 50%; text-align: left;">{{ formato_peso($contract->salary) }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>PERÍODO DE PAGO:</strong></td>
            <td style="width: 50%; text-align: left;">QUINCENAS VENCIDAS</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>FECHA DE INICIACIÓN DE LABORES:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->hiring_date->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>LUGAR DONDE DESEMPEÑARÁ LAS LABORES:</strong></td>
            <td style="width: 50%; text-align: left;">{{ $contract->destination }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>CIUDAD DONDE HA SIDO CONTRATADO:</strong></td>
            <td style="width: 50%; text-align: left;">MONTERÍA</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left;"><strong>LABOR PARA LA CUAL HA SIDO CONTRATADO:</strong></td>
            <td style="width: 50%; text-align: left;">DESEMPEÑAR EL CARGO DE {{ $contract->position }} EN LA {{ $contract->destination }} DURANTE EL TIEMPO QUE DURE {{ $contract->job }}</td>
        </tr>
    </table>

    <p>
    Entre los suscritos, <strong>MÓNICA MONTES USTA</strong>, mayor de edad, vecina de esta ciudad, identificada con cédula de ciudadanía No. 
    52.007.844 expedida en Bogotá D.C., en su condición de Representante Legal de la <strong>COOPERATIVA DE ENTIDADES DE SALUD DE CÓRDOBA -COODESCOR-</strong>, 
    con NIT No. 812.001.561-0, entidad sin ánimo de lucro legalmente constituida e inscrita en la Cámara de Comercio de Montería, 
    con domicilio principal en Montería (Córdoba), debidamente facultada para contratar, conforme a lo establecido en el numeral 
    4 del Artículo 63 del Estatuto aprobado por la Asamblea General de Asociados, quien para los efectos del presente contrato 
    se denominará el <strong>EMPLEADOR</strong>, por una parte y por la otra, <strong>{{ $contract->employee->full_name }}</strong>, mayor e identificado(a) con cédula de 
    ciudadanía No. <strong>{{ number_format($contract->identification, 0, ',', '.') }}</strong> expedida en <strong>{{ $contract->employee->city_expedition }}</strong>, de las condiciones arriba detalladas y quien para los 
    efectos del presente contrato se llamará el TRABAJADOR, se ha celebrado el presente contrato individual de trabajo por labor 
    contratada, regido además por las siguientes cláusulas: PRIMERA: OBJETO.- El <strong>EMPLEADOR</strong> contrata los servicios personales 
    del TRABAJADOR y este se obliga: a). A poner al servicio del <strong>EMPLEADOR</strong> toda su capacidad normal de trabajo, en forma 
    exclusiva en el desempeño de las funciones propias del oficio mencionado y en las labores anexas y complementarias del 
    mismo, de conformidad con las órdenes e instrucciones que le imparta el <strong>EMPLEADOR</strong> directamente o a través de sus 
    representantes. b). A no prestar directa ni indirectamente servicios laborales a otros empleadores, ni a trabajar por cuenta 
    propia o por interpuesta persona en el mismo oficio, durante la vigencia de este contrato. c). A guardar absoluta reserva 
    sobre los hechos, documentos físicos y/o electrónicos, informaciones y en general sobre todos los asuntos y materias que 
    lleguen a su conocimiento por causa o con ocasión de su contrato de trabajo. SEGUNDA: REMUNERACIÓN.- El <strong>EMPLEADOR</strong> pagará al 
    TRABAJADOR mensualmente por la prestación de sus servicios {{ formato_peso($contract->salary) }} pagaderos quincenalmente. Dentro de este 
    pago se encuentra incluida la remuneración de los descansos dominicales y festivos de que tratan los capítulos I, II y III 
    del título VII del Código Sustantivo del Trabajo. PARÁGRAFO PRIMERO.- Se aclara y se conviene que en los casos en los que 
    el TRABAJADOR devengue comisiones o cualquier otra modalidad de salario variable, el 82.5% de dichos ingresos, constituye 
    remuneración ordinaria y el 17.5% restante está designado a remunerar el descanso en los días dominicales y festivos que 
    tratan los capítulos I y II del título VII del Código Sustantivo de Trabajo. PARÁGRAFO SEGUNDO.- Se pacta entre las partes 
    que de conformidad con lo estipulado en el artículo 15 de la Ley 50 de 1990, que subrogó el artículo 128 del C.S.T. todos 
    los beneficios o auxilios extralegales, que reciba el TRABAJADOR en dinero o en especie, en forma permanente o eventual, 
    tales como habitación, alimentación, estudios, primas extralegales, vestuarios y todos los demás conceptos consagrados en el 
    mencionado artículo, no se tendrán en cuenta para efectos de establecer la base salarial de liquidación de prestaciones 
    sociales, ni para los pagos o aportes de que trata el artículo 17 de la Ley 344 de 1996.  PARAGRAFO TERCERO. - De 
    conformidad con lo consagrado en el artículo 30 de la Ley 1393/10, para los efectos de lo dispuesto en el artículo 30 de la 
    Ley 1393 de 2010, de los beneficios extralegales que eventualmente pueda recibir el trabajador, lo que exceda del 40% del 
    total recibido, incluidos los salarios, se incluirá para efectos de establecer la base de liquidación de aportes a la 
    seguridad social y parafiscales. PARAGRAFO CUARTO. Los salarios se reajustarán anualmente, tomando como base el valor del 
    salario devengado a 31 de diciembre del año anterior, adicionándole el valor resultante de multiplicar esta cifra por la 
    suma del IPC (índice de precios del consumidor) del mismo periodo, más un UNO POR CIENTO (1%). PARAGRAFO QUINTO. - 
    Igualmente se conviene por las partes que según lo dispone el citado Art. 15 de la Ley 50/90, el reconocimiento que a 
    continuación se precisa no tendrá carácter de salario ni se constituirá como base para liquidar acreencias laborales, 
    así: a). PRIMA DE VACACIONES.- Consistente en el pago del equivalente a quince (15) días de salario base del TRABAJADOR al 
    momento que se le autorice y/o reconozca el respectivo período de vacaciones. b). PRIMA DE PRODUCTIVIDAD.- El empleador 
    reconocerá a todos los trabajadores que estuvieron vinculados durante todo el periodo o proporcionalmente al año fiscal a 
    liquidar, una PRIMA DE PRODUCTIVIDAD, equivalente a un salario básico devengado por el funcionario, vigente a la fecha de 
    corte de ese periodo fiscal, si se laboró todo el año o proporcional al tiempo laborado, siempre y cuando los excedentes 
    netos del periodo fiscal a liquidar sean superiores a 325 SMMLV de acuerdo a los Estados Financieros aprobados previamente 
    por el Consejo de Administración y que la relación laboral se encuentre vigente a la fecha de aprobación de dichos Estados 
    Financieros por parte del Consejo de Administración. Dicha prima se liquidará y cancelará dentro del mes siguiente a la 
    fecha de aprobación de los Estados Financieros. TERCERA: TRABAJO SUPLEMENTARIO, NOCTURNO, DOMINICAL Y/O FESTIVO.- El TRABAJADOR 
    tendrá derecho al pago de trabajo suplementario o de horas extras y todo trabajo en horas nocturnas y en días festivos o 
    dominicales en los que legalmente se debe conceder descanso, se remunerará conforme a la Ley. Para el reconocimiento y pago 
    del trabajo antes indicado, el <strong>EMPLEADOR</strong> o su representante deberán haberlo autorizado previamente y por escrito. Cuando la 
    necesidad de este trabajo se presente de manera imprevista o inaplazable, deberá ejecutarse y darse cuenta de él por escrito, 
    a la mayor brevedad, al <strong>EMPLEADOR</strong> o a sus representantes para su aprobación. El <strong>EMPLEADOR</strong> en consecuencia, no reconocerá 
    ningún trabajo adicional a la jornada ordinaria, que no haya sido autorizado previamente o que, habiendo sido avisado 
    inmediatamente, no haya sido aprobado como queda dicho. CUARTA: JORNADA DE TRABAJO. - El TRABAJADOR se obliga a laborar la 
    jornada máxima legal, salvo estipulación expresa y escrita en contrario, en los turnos y dentro de las horas señaladas por 
    el EMPLEADOR, pudiendo hacer ésta ajustes o cambios de horario cuando lo estime conveniente. Por el acuerdo expreso o tácito 
    de las partes, podrán repartirse las horas de la jornada ordinaria en la forma prevista en el artículo 164 del C.S.T., 
    modificado por el artículo 23 de la Ley 50/90, teniendo en cuenta que los tiempos de descanso entre las secciones de la 
    jornada no se computan dentro de la misma. Las partes podrán acordar que se preste el servicio en los turnos de jornada 
    flexible contemplados en el Artículo 51 de la Ley 789 de 2002. QUINTA. - DURACIÓN DEL CONTRATO.- El presente contrato se 
    celebra por el término que dure {{ $contract->job }}. SEXTA: PERIODO DE PRUEBA.- Los primeros dos (2) meses del presente 
    contrato se considerarán como periodo de prueba de conformidad con el artículo 78 del Código Sustantivo del Trabajo, 
    modificado por el artículo 7º de la ley 50 de 1990, pudiéndose dar por terminado en este periodo unilateralmente el 
    contrato de trabajo sin previo aviso, sin perjuicio del reconocimiento de las prestaciones sociales y sin que se cause 
    indemnización alguna. SEPTIMA. - OBLIGACIONES DEL TRABAJADOR.- Además de las obligaciones consagradas en las normas que 
    regulan el presente contrato, el Reglamento Interno de Trabajo, circulares e instructivos de la empresa, el TRABAJADOR se 
    compromete  a cumplir con las siguientes obligaciones especiales: a). Prestar el servicio antes dicho, personalmente en la 
    ciudad de Montería o en el lugar del territorio de la República de Colombia que indicare el <strong>EMPLEADOR</strong>, siempre que el 
    cambio no implique desmejora de la remuneración básica ni de la categoría del TRABAJADOR. b). Asistir a todos los cursos o 
    capacitaciones para los cuales haya sido asignado por la empresa. c). Asistir a las reuniones programadas por la empresa. 
    d). Devolver en forma inmediata, a la terminación del contrato de trabajo todos los elementos utilizados en sus labores 
    tales como sellos, papelería, equipos de oficina y cualquier tipo de elemento de propiedad de la empresa que se encuentren 
    en su poder o bajo su responsabilidad. e). Dar cumplimiento a los programas, planes, procedimientos y actividades 
    relacionadas con la ejecución de los procesos que se implementen en la empresa como aseguramiento de la calidad, 
    administración del recurso humano, salud ocupacional, seguridad industrial y demás actividades de tipo organizacional. f). 
    A cumplir de manera inmediata las órdenes que le impartan las autoridades portuarias, de policía, aduanas, antinarcóticos, 
    tránsito, etc., en el ejercicio de sus facultades legales, y prestar toda su colaboración. g). Informar de manera inmediata 
    a su superior jerárquico de cualquier hecho que ponga en peligro su vida, la de sus compañeros y bienes o equipos de la 
    empresa. h). Las demás que le sean asignadas de conformidad con los reglamentos, órdenes e instrucciones que imparta el EMPLEADOR. 
    OCTAVA. - PROHIBICIONES.- A demás de las prohibiciones de orden legal consagradas en las normas que regulan el presente 
    contrato, el Reglamento Interno de Trabajo y circulares e instructivos de la empresa, se prohíbe al TRABAJADOR: a). 
    Solicitar préstamos, favores o ayuda económica a los clientes, proveedores o empleados del <strong>EMPLEADOR</strong> aprovechándose de su 
    cargo u oficio, o aceptarles donaciones de cualquier clase sin la previa autorización escrita del EMPLEADOR. b). Autorizar 
    o ejecutar operaciones que afecten los intereses del <strong>EMPLEADOR</strong> o negociar bienes, mercancías o servicios de la empresa en 
    provecho propio o de terceros. c). Retener dinero, cheques o documentos o hacer efectivo cheques o títulos valores recibidos 
    para el EMPLEADOR. d). Presentar cuentas de gastos ficticias o reportar como cumplidas las visitas, tareas u operaciones no 
    efectuadas. e). Cualquier actitud en los compromisos comerciales, personales o en las relaciones sociales, que puedan 
    afectar en forma nociva la reputación del EMPLEADOR. f). Retirar de las instalaciones donde funcione la empresa o cualquier 
    otro sitio bajo su responsabilidad vehículos, montacargas, contenedores, herramientas, equipos, piezas, repuestos, insumos, 
    elementos, máquinas, útiles, documentos de propiedad del <strong>EMPLEADOR</strong> sin su autorización previa. g). Ofrecer, informar, 
    prestar servicios o asesorías en forma directa o por intermedio de terceros a empresas clientes o personas naturales, sobre 
    productos o servicios propios del objeto social del EMPLEADOR. h). Entregar información confidencial, a cualquier persona, 
    relacionada con lista de precios, lista de clientes, productos en desarrollo. i). Tachar o enmendar, sin la correspondiente 
    observación, facturas, consignaciones y/o cualquier otro documento con información comercial de importancia para la empresa. 
    j). Utilizar las instalaciones de la empresa, equipos, teléfono, computadores, internet, etc., para realizar actividades 
    particulares distintas al objeto del contrato. k). Guardar silencio o no reportar a la Gerencia en forma inmediata, 
    cualquier hecho grave que ponga en peligro la seguridad de las personas, los bienes o finanzas de la empresa. l). Utilizar a 
    los trabajadores de la empresa, en horas de trabajo, para realizar actividades de carácter personal. ll). Transportar en los 
    vehículos de la empresa, personas, materiales, equipos, insumos químicos, o cualquier otro elemento o producto ajeno al 
    objeto social de la misma sin la previa autorización de la gerencia. m). Movilizar vehículos, montacargas, contenedores por 
    vías o entre lugares no autorizados. n). Quitar las claves de acceso a internet de los computadores asignados o de sus 
    compañeros, sin autorización previa de su jefe inmediato. ñ). Acceder a páginas de internet de entretenimiento, pornográficas o 
    cualquier otra que no tenga que ver con el cumplimiento de sus obligaciones laborales. o). Discriminar de cualquier forma a 
    sus compañeros de trabajo por razones de sexo, raza, religión o políticas. NOVENA.-  TERMINACIÓN UNILATERAL.- Son justas 
    causas para dar por terminado unilateralmente este contrato, por cualquiera de las partes, las enumeradas en los artículos 
    62 y 63 del C.S.T., modificado por el Decreto 2351 de 1965, el incumplimiento de cualquiera de las obligaciones o 
    prohibiciones consagradas en las cláusulas octava y novena, así sea por primera vez y además, por parte del <strong>EMPLEADOR</strong> las 
    faltas que para el efecto se califiquen como graves en reglamentos y demás documentos que contengan reglamentaciones, 
    órdenes, instrucciones o prohibiciones de carácter general o particular, pactos, convenciones colectivas, laudos arbitrales, 
    y particularmente las siguientes: a). Presentar cualquier documento que sea ficticio. b). Actuar en forma desleal o 
    deshonesta con la empresa o compañeros de trabajo. c). No entregar o consignar en forma inmediata o a más tardar al 
    finalizar la jornada laboral, dineros, títulos valores, etc. d). Realizar cualquier tipo de transacción a título personal o 
    para favorecer a terceros a nombre del EMPLEADOR, utilizando para ello, los permisos o certificaciones de la empresa. e). 
    Tratar de que se aprueben negocios sin el lleno de la totalidad de los requisitos establecidos para ello. f). Dar u ofrecer 
    cualquier tipo de dádiva a cualquier trabajador de la empresa a fin de lograr su silencio, trato preferencial, no llenar la 
    totalidad de información según el caso o no seguir el conducto regular en el cumplimiento de sus funciones. g). Maltratar o 
    irrespetar a clientes, proveedores o compañeros de trabajo o realizar cualquier acto que atente contra la dignidad. h). No 
    realizar oportunamente los informes que deba realizar en virtud de sus obligaciones. DECIMA.- MODIFICACIÓN DE LAS CONDICIONES LABORALES.- 
    El TRABAJADOR acepta desde ahora expresamente todas las modificaciones determinadas por el EMPLEADOR, en ejercicio del poder 
    subordinante, de sus condiciones laborales, tales como la jornada de trabajo, el lugar de prestación de servicios, el cargo 
    u oficio y/o funciones y la forma de remuneración, siempre que tales modificaciones no afecten su honor, dignidad o sus 
    derechos mínimos ni impliquen desmejoras sustanciales o graves perjuicios para él, de conformidad con lo dispuesto por el 
    artículo 23 del C.S.T. modificado por el art. 1° de la Ley 50/90. Los gastos que se originen con el traslado de lugar de 
    prestación del servicio serán cubiertos por el <strong>EMPLEADOR</strong> de conformidad con el numeral 8° del art. 57 del .- C.S.T. 
    DECIMA PRIMERA: INVENCIONES.- Las invenciones o descubrimientos realizados por el TRABAJADOR contratado para investigar 
    pertenecen a el EMPLEADOR, de conformidad con el artículo 539 del Código de Comercio, así como el artículo 20 y concordantes 
    de la ley 23 de 1982 sobre derechos de autor. En cualquier otro caso el invento pertenece al TRABAJADOR, salvo cuando este 
    no haya sido contratado para investigar y realice la invención mediante datos o medios conocidos o utilizados en razón de 
    la labor desempeñada, evento en el cual el trabajador, tendrá derecho a una compensación que se fijará de acuerdo con el 
    monto del salario, la importancia del invento o descubrimiento, el beneficio que reporte al empleador u otros factores 
    similares. DECIMA SEGUNDA. - DIRECCIÓN DEL TRABAJADOR.-  El TRABAJADOR para todos los efectos legales y en especial para la 
    aplicación del parágrafo 1º del artículo 29 de la Ley 789/02, la cual modificó el art. 65 del C.S.T., se compromete a 
    informar por escrito y de manera inmediata a el <strong>EMPLEADOR</strong> cualquier cambio en su dirección de residencia, teniéndose en 
    todo caso como suya, la última dirección registrada en su hoja de vida. DÉCIMA TERCERA. - CONFIDENCIALIDAD Y RESERVA.- 
    El TRABAJADOR se obliga a desempeñar las funciones del cargo para el cual fue contratado con lealtad, buena fe y fidelidad 
    con el EMPLEADOR,  por lo tanto, se entiende que todos los asuntos e información que el TRABAJADOR conozca directa o 
    indirectamente por razón de su cargo tendrán el carácter de confidenciales y reservados y, en consecuencia se obliga a: a). 
    Utilizar la información, única y exclusivamente para el desarrollo de las mismas, siguiendo siempre las directrices 
    impartidas por el <strong>EMPLEADOR</strong>. b). Abstenerse de divulgar, revelar o reproducir, la información que le haya sido entregada o 
    que conozca en razón o no, de su vinculación laboral con el <strong>EMPLEADOR</strong>. c). Abstenerse de utilizar la información, para el 
    beneficio directo o indirecto de alguna otra persona, entidad o compañía, diferente del <strong>EMPLEADOR</strong>. d). Abstenerse de 
    mencionar o entregar la información, a terceras personas incluidos empleados y asesores del <strong>EMPLEADOR</strong>, aun los que se 
    encuentren bajo su subordinación o coordinación, que no deban conocerlos por razón de sus funciones. El TRABAJADOR deberá 
    guardar confidencialidad sobre secretos comerciales y administrativos que en ejercicio de su cargo llegue a conocer de 
    manera directa o indirecta. Para los efectos previstos en esta cláusula, se entenderá que entre otros, pero no 
    exclusivamente, forman parte de la información confidencial todos los manuales, formatos, conceptos, contratos, documentos 
    legales, financieros, contables o de cualquier orden, procesos, metodologías, procedimientos, métodos de operación, datos, 
    planos, contratos, proveedores, recursos, gráficas, software, incluidos los diseñados o creados por el <strong>EMPLEADOR</strong>, 
    información visual, verbal o escrita, ideas, equipos, estrategias de mercado, publicidad, precios, términos y detalles 
    relacionados con la identificación, el objeto social y los negocios y actividades del EMPLEADOR, sus subordinadas, 
    controlantes, relacionados, clientes, asesores, o asociados bajo cualquier modalidad contractual con el <strong>EMPLEADOR</strong>, 
    incluyendo condiciones, estructura y detalles relacionados con cualquier operación, negociación, proyecto, asesoría, 
    investigación que desarrolle el <strong>EMPLEADOR</strong>, sus subordinadas, controlantes, relacionados, clientes, asesores, o asociados 
    bajo cualquier modalidad contractual con el <strong>EMPLEADOR</strong>. Igualmente, le está prohibido al TRABAJADOR sacar, extraer o enviar 
    por cualquier medio, fuera de la empresa, ya sea para uso directo o con destino a terceros, documentos, datos, informes, 
    software y en general cualquier tipo de información, salvo que sea necesario para el desarrollo normal de sus funciones y, 
    con autorización previa, expresa y escrita del <strong>EMPLEADOR</strong>. El TRABAJADOR deberá comunicar a el <strong>EMPLEADOR</strong> toda la información 
    de la que tenga conocimiento respecto a acciones de terceros que hayan o intenten sacar, extraer o enviar por cualquier 
    medio, fuera de la empresa, documentos, datos, informes, software y en general cualquier tipo de información. El TRABAJADOR 
    reconoce que todos los originales y copias de manuales, correspondencia, notas, informes, cuadernos, fotografías, diseños 
    y cualquier otro material grabado, impreso o escrito en cualquier forma que incluya o refleje la información, aún el 
    preparado por el <strong>EMPLEADOR</strong> durante la vigencia del contrato de trabajo, son propiedad del <strong>EMPLEADOR</strong> y el TRABAJADOR se 
    obliga a entregarle a el <strong>EMPLEADOR</strong> los que se encuentren en su poder al terminar el contrato de trabajo, o antes, si así 
    lo solicita el <strong>EMPLEADOR</strong>. El TRABAJADOR reconoce que el incumplimiento del deber de reserva y confidencialidad pactado en 
    los términos de la presente cláusula constituye falta grave de conformidad con lo dispuesto en el numeral 6º del literal a) 
    del artículo 7º del Decreto 2351 de 1965, meritoria incluso de la terminación del contrato de trabajo, lo anterior sin 
    perjuicio de las demás acciones legales que pueda adelantar el <strong>EMPLEADOR</strong>. PARÁGRAFO PRIMERO. - El deber de reserva y 
    confidencialidad se mantendrá vigente aún después de haber finalizado la relación laboral que une al <strong>EMPLEADOR</strong> y 
    al TRABAJADOR, por término indefinido. PARÁGRAFO SEGUNDO. - El TRABAJADOR declara que conoce y entiende las normas legales 
    sobre propiedad intelectual y competencia comercial, comprometiéndose por tanto a cumplirlas durante la ejecución de su 
    contrato de trabajo y con posterioridad a su terminación. PARÁGRAFO TERCERO. - El TRABAJADOR, a la terminación de su 
    contrato de trabajo por cualquier causa devolverá inmediatamente al <strong>EMPLEADOR</strong> cualquier documento, información o elemento 
    que le haya sido entregado para el cumplimiento de sus funciones. DÉCIMA CUARTA. - EFECTOS.- El presente contrato remplaza 
    en su integridad, a partir de la fecha y deja sin efecto alguno cualquier otro contrato verbal o escrito celebrado por las 
    partes con anterioridad. Las modificaciones que se acuerden al mismo se realizarán por escrito, se suscribirán por las 
    partes y harán parte integrante del presente contrato. El TRABAJADOR mediante este contrato declara que ha leído, entiende 
    y acepta el contenido del mismo así como también el del Reglamento Interno de Trabajo del <strong>EMPLEADOR</strong>. Para constancia se 
    firma en dos (02) ejemplares del mismo tenor y valor ante testigos, un ejemplar de los cuales recibe el TRABAJADOR en este 
    acto, en la ciudad de Montería, el {{ optional($contract->hiring_date)->format('d/m/Y') }}.
    </p>

    <div class="firma-section">

        <!-- EMPLEADOR -->
        <div class="block">
            <div class="title-firma">EL EMPLEADOR</div>

            <div class="nombre-empleador">MÓNICA MONTES USTA</div>
            <div class="cargo-empleador">Gerente</div>
            <div class="empresa">COOPERATIVA DE ENTIDADES DE SALUD DE CÓRDOBA –COODESCOR–</div>
        </div>

        <!-- TRABAJADOR -->
        <div class="block">
            <div class="title-firma">EL TRABAJADOR</div>

            <div class="trabajador-nombre">{{ $contract->full_name }}</div>
            <div>Cédula de ciudadanía No. {{ $contract->identification }} expedida en {{ $contract->employee->expedition_city }}</div>
        </div>

        <!-- TESTIGOS -->
        <div class="block">
            <div class="title-firma">TESTIGOS</div>

            <br><br><br>
            __________________________________________ <br>
            Nombre Testigo 1 <br><br><br>

            __________________________________________ <br>
            Nombre Testigo 2
        </div>

    </div>
</body>
</html>