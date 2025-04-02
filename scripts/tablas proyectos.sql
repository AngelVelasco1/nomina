DROP TABLE IF EXISTS public.tab_proyectos CASCADE;
-- 1
CREATE TABLE public.tab_proyectos (
	id int8,
	bpin int8,
	nombre varchar,
	objeto varchar,
	tipos_proyecto_id int8,
	procesos_id int8,
	fases_id int8,
	sectores_id int8,
	tipos_entidad_id int8, 
	entidades_id int8,
	tipos_banco_id int8,
	analisis_participantes varchar, -- coordinacion entre participantes
	poblacion_afectada int,
	fuente_poblacion_afectada varchar,
	poblacion_objetivo int,
	fuente_poblacion_objetivo varchar,
	evaluacion_costo_beneficio int, -- 1 ó 0
	evaluacion_rentabilidad int, 	-- 1 ó 0
	evaluacion_multicriterio int, 	-- 1 ó 0
	estados_proyectos_mga_id int8,
	sitio_proyecto varchar,
	tasa_oportunidad double PRECISION,
	descripcion_tasa_oportunidad varchar,
	tipos_poblacion_objetivo_id int8,
	tipos_poblacion_afectada_id int8,		
	fecha_registro timestamp,
	fecha_actualizacion timestamp,
	creado_por varchar,
	actualizado_por varchar,
	es_proyecto_base int,
	tipo_inversion_id int, -- NO tiene tabla
	producto_principal_id int8,
	estado_migracion int, -- NO tiene tabla
	subprogramas int8,	-- NO tiene tabla
	nacion_programas int8,  -- es el codigo del programa
	vigencia_desde timestamp,
	vigencia_hasta timestamp,
	valor double precision,
	eliminado boolean DEFAULT FALSE,
	PRIMARY KEY (id),
	FOREIGN KEY (tipos_proyecto_id) REFERENCES public.tab_tipos_proyecto(id),	
	FOREIGN KEY (procesos_id) REFERENCES public.tab_procesos(id),	
	FOREIGN KEY (sectores_id) REFERENCES public.tab_sectores(id),	
	FOREIGN KEY (tipos_entidad_id) REFERENCES public.tab_tipos_entidad(id),	
	FOREIGN KEY (entidades_id) REFERENCES public.tab_entidades(id),	
	FOREIGN KEY (estados_proyectos_mga_id) REFERENCES public.tab_estados_proyectos_mga(id),	
	FOREIGN KEY (tipos_poblacion_objetivo_id) REFERENCES public.tab_tipos_poblacion(id),	
	FOREIGN KEY (tipos_poblacion_afectada_id) REFERENCES public.tab_tipos_poblacion(id),	
	FOREIGN KEY (producto_principal_id) REFERENCES public.tab_productos_catalogo(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_contribucion_politica_publica CASCADE;
-- 2
CREATE TABLE public.tab_proyectos_contribucion_politica_publica (
	id int8,
	proyectos_id int8,
	nacion_planes_id int8, 
	nacion_pilares_id int8, 
	nacion_estrategias_id int8, 
	nacion_programas_id int8,
	plan_desarrollo_sectorial varchar,
	estrategia_sectorial varchar,	
	programa_sectorial varchar,
	plan_desarrollo_municipal varchar,
	estrategia_municipal varchar,	
	programa_municipal varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (nacion_planes_id) REFERENCES public.tab_nacion_planes(id) 
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (nacion_pilares_id) REFERENCES public.tab_nacion_pilares(id) 
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (nacion_estrategias_id) REFERENCES public.tab_nacion_estrategias(id) 
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (nacion_programas_id) REFERENCES public.tab_nacion_programas(id) 
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_localizaciones CASCADE;
-- 3
CREATE TABLE public.tab_proyectos_localizaciones (
	id int8,
	proyectos_id int8,		-- otras localizaciones
	alternativas_id int8, 	-- localizacion alternativa
	regiones_id int8,
	departamentos_id int8,
	municipios_id int8,
	tipos_localizacion_id int8,
	centros_poblados_id int8,
	localizacion_especifica varchar,
	latitud DOUBLE PRECISION,
	longitud DOUBLE PRECISION,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (regiones_id) REFERENCES public.tab_regiones(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (departamentos_id) REFERENCES public.tab_departamentos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (municipios_id) REFERENCES public.tab_municipios(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_localizacion_id) REFERENCES public.tab_tipos_localizacion(id),
	FOREIGN KEY (centros_poblados_id) REFERENCES public.tab_centros_poblados(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_problema_central CASCADE;
-- 4
CREATE TABLE public.tab_proyectos_problema_central (
	id int8,
	proyectos_id int8,
	problema_central varchar,
	situacion varchar,
	magnitud varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_causas CASCADE;
-- 5
CREATE TABLE public.tab_proyectos_causas (
	id int8,
	problema_central_id int8,
	descripcion varchar,
	causas_id int8,
	tipos_causa_efecto_id int8,
	PRIMARY KEY (id),
	FOREIGN KEY (problema_central_id) REFERENCES public.tab_proyectos_problema_central(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_causa_efecto_id) REFERENCES public.tab_tipos_causa_efecto(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_efectos CASCADE;
-- 6
CREATE TABLE public.tab_proyectos_efectos (
	id int8,
	problema_central_id int8,
	descripcion varchar,
	efectos_id int8,
	tipos_causa_efecto_id int8,
	PRIMARY KEY (id),
	FOREIGN KEY (problema_central_id) REFERENCES public.tab_proyectos_problema_central(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_causa_efecto_id) REFERENCES public.tab_tipos_causa_efecto(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_objetivos_especificos CASCADE;
-- 7
CREATE TABLE public.tab_proyectos_objetivos_especificos (
	id int8,
	causas_id int8,
	objetivo_especifico varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (causas_id) REFERENCES public.tab_proyectos_causas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_participantes CASCADE;
-- 8
CREATE TABLE public.tab_proyectos_participantes (
	id int8,
	proyectos_id int8,
	actores_id int8,
	entidades_participantes_id int8,
	entidad_participante_nombre varchar,
	posiciones_id int8,
	tipo_contribucion varchar,
	intereses_expectativas varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (actores_id) REFERENCES public.tab_actores(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (entidades_participantes_id) REFERENCES public.tab_entidades_participantes(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (posiciones_id) REFERENCES public.tab_posiciones(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_caracteristicas_demograficas CASCADE;
-- 9
CREATE TABLE public.tab_proyectos_caracteristicas_demograficas (
	id int8,
	proyectos_id int8,
	tipos_caracteristicas_id int8, 
	clasificacion_caracteristicas_id int8,
	numero_personas int,
	fuente_informacion varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_caracteristicas_id) REFERENCES public.tab_tipos_caracteristicas(id),
	FOREIGN KEY (clasificacion_caracteristicas_id) REFERENCES public.tab_clasificacion_caracteristicas(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_objetivo_general CASCADE;
-- 10
CREATE TABLE public.tab_proyectos_objetivo_general (
	id int8,
	proyectos_id int8,
	objetivo_general varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_indicadores_objetivo CASCADE;
-- 11
CREATE TABLE public.tab_proyectos_indicadores_objetivo (
	id int8,
	objetivo_general_id int8,
	descripcion varchar,
	meta double PRECISION,
	unidades_medida_id int8,
	tipos_fuente_verificacion_id int8,
	fuente_verificacion varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (objetivo_general_id) REFERENCES public.tab_proyectos_objetivo_general(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (unidades_medida_id) REFERENCES public.tab_unidades_medida(id),
	FOREIGN KEY (tipos_fuente_verificacion_id) REFERENCES public.tab_tipos_fuente_verificacion(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_alternativas CASCADE;
-- 12
CREATE TABLE public.tab_proyectos_alternativas (
	id int8,
	proyectos_id int8,
	nombre varchar,
	pasa_preparacion int,
	estados_alternativas_id int8,
	analisis_tecnico varchar,
	es_seleccionado int,
	horizonte_proyecto int,
	es_predeterminado int,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (estados_alternativas_id) REFERENCES public.tab_estados_alternativas(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_bienes_servicios CASCADE;
-- 13
CREATE TABLE public.tab_proyectos_bienes_servicios (
	id int8,
	alternativas_id int8,
	nombre varchar,
	descripcion varchar,
	tipos_medida_id int8, -- NO tiene el tipo de medida solo id NO llave foranea
	año_inicio varchar,
	año_fin varchar,
	año_pasado varchar,
	descripcion_oferta varchar,
	descripcion_demanda varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);

DROP TABLE IF EXISTS public.tab_proyectos_historico_bienes_servicios CASCADE;
-- 14
CREATE TABLE public.tab_proyectos_historico_bienes_servicios (
	id int8,
	bienes_servicios_id int8,
	año varchar,
	oferta double precision,
	demanda double precision,
	deficit double precision,
	PRIMARY KEY (id),
	FOREIGN KEY (bienes_servicios_id) REFERENCES public.tab_proyectos_bienes_servicios(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);

DROP TABLE IF EXISTS public.tab_proyectos_factores_analizados CASCADE;
-- 15
CREATE TABLE public.tab_proyectos_factores_analizados (
	id int8,
	alternativas_id int8,
	factores_id int8,
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (factores_id) REFERENCES public.tab_factores(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_productos CASCADE;
-- 16
CREATE TABLE public.tab_proyectos_productos (
	id int8,
	alternativas_id int8,
	productos_catalogo_id int8,
	complemento varchar,
	tipos_medida_id int8,
	cantidad double PRECISION,
	objetivo_especifico_id int8,
	meta double PRECISION,
	nombre_auto_indicador varchar,
	tipos_fuente_verificacion_id int8,
	fuente_verificacion varchar,
	indicador_meta_automatico double PRECISION,
	tipos_medida_indicador_automatic int8,
	indicador_automatico_id int8, -- trae 0
	beneficiarios int,
	descripcion_beneficiarios varchar,	
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (productos_catalogo_id) REFERENCES public.tab_productos_catalogo(id),
	FOREIGN KEY (tipos_medida_id) REFERENCES public.tab_tipos_medida(id),
	FOREIGN KEY (tipos_fuente_verificacion_id) REFERENCES public.tab_tipos_fuente_verificacion(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_actividades CASCADE;
-- 17
CREATE TABLE public.tab_proyectos_actividades (
	id int8,
	productos_id int8,
	etapas_id int8,
	nombre varchar,
	ruta_critica int,				-- 1
	innovacion_cientifica int,	 	-- 0
	costo double PRECISION,
	PRIMARY KEY (id),
	FOREIGN KEY (productos_id) REFERENCES public.tab_proyectos_productos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (etapas_id) REFERENCES public.tab_etapas(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_entradas CASCADE;
-- 18
CREATE TABLE public.tab_proyectos_entradas (
	id int8,
	actividades_id int8,
	tipos_entrada_id int8,
	periodo int,				-- 1
	valor_pesos double PRECISION,
	PRIMARY KEY (id),
	FOREIGN KEY (actividades_id) REFERENCES public.tab_proyectos_actividades(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_entrada_id) REFERENCES public.tab_tipos_entrada(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_indicador_producto CASCADE;
-- 19 cuando es el indicador adicional o alterno algo asi
CREATE TABLE public.tab_proyectos_indicador_producto (
	id int8,
	productos_id int8,
	descripcion varchar,
	bisindicadorid int,				-- 1
	meta double precision,
	unidades_medida_id int8,
	indicador_programa_id int8,
	tipos_fuente_verificacion_id int8,
	fuente_verificacion varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (productos_id) REFERENCES public.tab_proyectos_productos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (unidades_medida_id) REFERENCES public.tab_unidades_medida(id),
	FOREIGN KEY (indicador_programa_id) REFERENCES public.tab_indicador_programa(id),	
	FOREIGN KEY (tipos_fuente_verificacion_id) REFERENCES public.tab_tipos_fuente_verificacion(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_indicador_producto_detalles CASCADE;
-- 20 cuando es el indicador adicional o alterno algo asi
CREATE TABLE public.tab_proyectos_indicador_producto_detalles (
	id int8,
	indicador_producto_id int8,
	periodo int,	
	meta double precision,
	PRIMARY KEY (id),
	FOREIGN KEY (indicador_producto_id) REFERENCES public.tab_proyectos_indicador_producto(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);

DROP TABLE IF EXISTS public.tab_proyectos_auto_indicador_producto_detalles CASCADE;
-- 21
CREATE TABLE public.tab_proyectos_auto_indicador_producto_detalles (
	id int8,
	auto_indicador_producto_id int8,
	periodo int,
	meta double precision,
	PRIMARY KEY (id),
	FOREIGN KEY (auto_indicador_producto_id) REFERENCES public.tab_proyectos_indicador_producto(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);

DROP TABLE IF EXISTS public.tab_proyectos_riesgos CASCADE;
-- 22
CREATE TABLE public.tab_proyectos_riesgos (
	id int8,
	alternativas_id int8,
	nivel_clasificacion_id int8,
	tipos_riesgo_id int8,
	descripcion varchar,
	probabilidades_id int8, 
	impactos_id int8,
	efectos varchar,
	mitigacion varchar,	
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (nivel_clasificacion_id) REFERENCES public.tab_nivel_clasificacion(id),
	FOREIGN KEY (tipos_riesgo_id) REFERENCES public.tab_tipos_riesgo(id),
	FOREIGN KEY (probabilidades_id) REFERENCES public.tab_probabilidades(id),
	FOREIGN KEY (impactos_id) REFERENCES public.tab_impactos(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_supuestos CASCADE;
-- 23
CREATE TABLE public.tab_proyectos_supuestos (
	id int8,
	riesgos_id int8,
	descripcion varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (riesgos_id) REFERENCES public.tab_proyectos_riesgos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_beneficios CASCADE;
-- 24
CREATE TABLE public.tab_proyectos_beneficios (
	id int8,
	alternativas_id int8,
	tipos_beneficio_id int8,
	tipos_medida_id int8,
	descripcion varchar,
	bienes_id int8,
	descripcion_cantidad varchar,
	descripcion_valor_unitario varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_beneficio_id) REFERENCES public.tab_tipos_beneficio(id),
	FOREIGN KEY (tipos_medida_id) REFERENCES public.tab_tipos_medida(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_beneficios_detalles CASCADE;
-- 25
CREATE TABLE public.tab_proyectos_beneficios_detalles (
	id int8,
	beneficios_id int8,
	periodo int,
	cantidad double precision,
	valor_unitario double precision,
	valor_total double precision,
	PRIMARY KEY (id),
	FOREIGN KEY (beneficios_id) REFERENCES public.tab_proyectos_beneficios(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_indicadores_gestion CASCADE;
-- 26
CREATE TABLE public.tab_proyectos_indicadores_gestion (
	id int8,
	proyectos_id int8,
	descripcion varchar,
	indicadores_id int8,
	tipos_fuente_verificacion_id int8,
	fuente_verificacion varchar,	
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (indicadores_id) REFERENCES public.tab_indicadores(id),
	FOREIGN KEY (tipos_fuente_verificacion_id) REFERENCES public.tab_tipos_fuente_verificacion(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_indicadores_gestion_detalles CASCADE;
-- 27
CREATE TABLE public.tab_proyectos_indicadores_gestion_detalles (
	id int8,
	indicadores_gestion_id int8,
	periodo int,
	meta double precision,
	PRIMARY KEY (id),
	FOREIGN KEY (indicadores_gestion_id) REFERENCES public.tab_proyectos_indicadores_gestion(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);

DROP TABLE IF EXISTS public.tab_proyectos_fuentes_financiacion CASCADE;
-- 28
CREATE TABLE public.tab_proyectos_fuentes_financiacion (
	id int8,
	proyectos_id int8,
	tipos_gasto_id int8,
	subprogramas_id int8,
	PRIMARY KEY (id),
	FOREIGN KEY (proyectos_id) REFERENCES public.tab_proyectos(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_gasto_id) REFERENCES public.tab_tipos_gasto(id),	
	FOREIGN KEY (subprogramas_id) REFERENCES public.tab_subprogramas(id)	
);

DROP TABLE IF EXISTS public.tab_proyectos_fuentes CASCADE;
-- 29
CREATE TABLE public.tab_proyectos_fuentes (
	id int8,
	fuentes_financiacion_id int8,
	tipos_entidad_id int8,
	tipos_recurso_id int8,
	etapas_id int8,
	otra_entidad varchar,
	entidades_id int8, -- entidad_catalogo
	PRIMARY KEY (id),
	FOREIGN KEY (fuentes_financiacion_id) REFERENCES public.tab_proyectos_fuentes_financiacion(id)	
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (tipos_entidad_id) REFERENCES public.tab_tipos_entidad(id),
	FOREIGN KEY (tipos_recurso_id) REFERENCES public.tab_tipos_recurso(id),
	FOREIGN KEY (etapas_id) REFERENCES public.tab_etapas(id),
	FOREIGN KEY (entidades_id) REFERENCES public.tab_entidades(id)
);

DROP TABLE IF EXISTS public.tab_proyectos_fuentes_programacion CASCADE;
-- 30
CREATE TABLE public.tab_proyectos_fuentes_programacion (
	id int8,
	fuentes_id int8,
	periodo int,
	cantidad double precision,	
	PRIMARY KEY (id),
	FOREIGN KEY (fuentes_id) REFERENCES public.tab_proyectos_fuentes(id)	
	ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS public.tab_proyectos_evaluacion_economica CASCADE;
-- 31
CREATE TABLE public.tab_proyectos_evaluacion_economica (
	id serial, -- NO tiene id en xml
	alternativas_id int8,
	vpn double precision,
	tir double precision,
	rbc double precision,
	cxc double precision,
	cxb double precision,
	vpc double precision,
	cae double precision,
	tipo_moneda varchar,
	PRIMARY KEY (id),
	FOREIGN KEY (alternativas_id) REFERENCES public.tab_proyectos_alternativas(id)	
	ON UPDATE CASCADE ON DELETE CASCADE	
);