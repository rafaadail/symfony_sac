--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: chamado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE chamado (
    id integer NOT NULL,
    id_pedido integer,
    email character varying(45) DEFAULT NULL::character varying,
    titulo character varying(60) DEFAULT NULL::character varying,
    observacao character varying(255) NOT NULL,
    data_criacao timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    nome_cliente character varying(60) DEFAULT NULL::character varying
);


ALTER TABLE chamado OWNER TO postgres;

--
-- Name: TABLE chamado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE chamado IS 'table chamado';


--
-- Name: chamado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chamado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chamado_id_seq OWNER TO postgres;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cliente (
    id integer NOT NULL,
    email character varying(50) DEFAULT NULL::character varying,
    data_criacao date
);


ALTER TABLE cliente OWNER TO postgres;

--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente_id_seq OWNER TO postgres;

--
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pedido (
    id integer NOT NULL,
    id_cliente integer,
    valor numeric(10,2) DEFAULT NULL::numeric,
    data_criacao date
);


ALTER TABLE pedido OWNER TO postgres;

--
-- Name: pedido_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedido_id_seq OWNER TO postgres;

--
-- Data for Name: chamado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY chamado (id, id_pedido, email, titulo, observacao, data_criacao, nome_cliente) FROM stdin;
20	2	test@teste.com	Erro cadastro	obs1	2017-05-23 04:20:37	Rafael
21	5	joao@teste.com	Erro calculo icms	obs 2	2017-05-23 04:21:25	Jose
22	6	joao@teste.com	Erro grid pedio	obs 3	2017-05-23 04:22:13	João
23	7	maria@teste.com	Erro pedido itens	obs 5	2017-05-23 04:22:57	Maria
24	16	test@teste.com	Erro grid pedio	obs 7	2017-05-23 04:24:27	Marcos
25	27	pedro@teste.com	Erro valor bruto	obs 8	2017-05-23 04:25:11	Pedro
26	1	ana@teste.com	Erro pedido itens	tetss	2017-05-23 04:26:07	Ana
27	16	bruna@teste.com	Erro consulta	obs 8	2017-05-23 04:26:55	Bruna
28	15	bruno@teste.com	Erro icmst	obs 15	2017-05-23 04:29:18	Bruno
29	30	thiago@test.com	Erro ie	Teste	2017-05-23 04:30:28	Thiago
30	14	silvia@teste.com	Erro ipi	obs11	2017-05-23 04:31:22	Silvia
31	12	nilza@teste.com	Erro cent	obs556	2017-05-23 04:32:30	Nilza
\.


--
-- Name: chamado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chamado_id_seq', 31, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (id, email, data_criacao) FROM stdin;
16	zrogahn@example.org	2017-05-21
17	eliza16@example.org	2017-05-21
18	kaden.collier@example.org	2017-05-21
19	claudie85@example.org	2017-05-21
20	botsford.joaquin@example.org	2017-05-21
21	corene58@example.org	2017-05-21
22	maria.erdman@example.org	2017-05-21
23	nolan.marielle@example.org	2017-05-21
24	shaylee52@example.org	2017-05-21
25	geovany75@example.org	2017-05-21
26	victor32@example.org	2017-05-21
27	shania.bednar@example.org	2017-05-21
28	dkunze@example.org	2017-05-21
29	cole.cheyanne@example.org	2017-05-21
30	mallory.kassulke@example.org	2017-05-21
31	rafaadail@hotmail.com	2017-05-21
32	ew	2017-05-21
33	grger	2017-05-21
34	rafagol93@yahoo.com	2017-05-22
35	teste@unicastelo	2017-05-22
36	test@teste.com	2017-05-22
37	teste@sac.com	2017-05-23
38	joao@teste.com	2017-05-23
39	marcos@teste.com	2017-05-23
40	maria@teste.com	2017-05-23
41	jose@teste.com	2017-05-23
42	ausgusto@teste.com	2017-05-23
43	pedro@teste.com	2017-05-23
44	ana@teste.com	2017-05-23
45	bruna@teste.com	2017-05-23
46	bruno@teste.com	2017-05-23
47	thiago@test.com	2017-05-23
48	silvia@teste.com	2017-05-23
49	nilza@teste.com	2017-05-23
\.


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cliente_id_seq', 49, true);


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido (id, id_cliente, valor, data_criacao) FROM stdin;
1	6	566.00	2017-05-21
2	12	770.00	2017-05-21
3	1	957.00	2017-05-21
4	3	625.00	2017-05-21
5	11	375.00	2017-05-21
6	9	526.00	2017-05-21
7	12	412.00	2017-05-21
8	3	892.00	2017-05-21
9	4	557.00	2017-05-21
10	5	760.00	2017-05-21
11	12	339.00	2017-05-21
12	3	534.00	2017-05-21
13	11	835.00	2017-05-21
14	9	588.00	2017-05-21
15	7	492.00	2017-05-21
16	14	875.00	2017-05-21
17	7	384.00	2017-05-21
18	14	943.00	2017-05-21
19	6	999.00	2017-05-21
20	9	874.00	2017-05-21
21	5	455.00	2017-05-21
22	14	402.00	2017-05-21
23	2	390.00	2017-05-21
24	4	692.00	2017-05-21
25	9	423.00	2017-05-21
26	11	665.00	2017-05-21
27	10	763.00	2017-05-21
28	14	961.00	2017-05-21
29	10	545.00	2017-05-21
30	2	537.00	2017-05-21
\.


--
-- Name: pedido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_id_seq', 30, true);


--
-- Name: chamado chamado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chamado
    ADD CONSTRAINT chamado_pkey PRIMARY KEY (id);


--
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- Name: pedido pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (id);


--
-- Name: uniq_f41c9b25e7927c74; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX uniq_f41c9b25e7927c74 ON cliente USING btree (email);


--
-- PostgreSQL database dump complete
--

