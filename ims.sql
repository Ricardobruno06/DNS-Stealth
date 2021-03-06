PGDMP     	            
    	    v            ims    9.5.14    9.5.14 7    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    16424    ims    DATABASE     �   CREATE DATABASE ims WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE ims;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6            �           0    0    SCHEMA public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6                        3079    12355    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16427    address    TABLE     �   CREATE TABLE public.address (
    addresss_id integer NOT NULL,
    street character varying(25) NOT NULL,
    city character varying(25) NOT NULL,
    state character varying(25) NOT NULL
);
    DROP TABLE public.address;
       public         postgres    false    6            �            1259    16430    admin    TABLE     �   CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    admin_name character varying(25) NOT NULL,
    admin_contact_no character varying(25) NOT NULL,
    admin_email character varying(25) NOT NULL
);
    DROP TABLE public.admin;
       public         postgres    false    6            �            1259    16433    bill_id_seq    SEQUENCE     t   CREATE SEQUENCE public.bill_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.bill_id_seq;
       public       postgres    false    6            �            1259    16435 
   categories    TABLE     w   CREATE TABLE public.categories (
    category_id integer NOT NULL,
    category_name character varying(25) NOT NULL
);
    DROP TABLE public.categories;
       public         postgres    false    6            �            1259    16438    category_id_seq    SEQUENCE     x   CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.category_id_seq;
       public       postgres    false    6            �            1259    16440    customer    TABLE     �   CREATE TABLE public.customer (
    customer_id integer NOT NULL,
    customer_name character varying(25) NOT NULL,
    customer_contact_no character varying(25) NOT NULL,
    customer_email character varying(25) NOT NULL
);
    DROP TABLE public.customer;
       public         postgres    false    6            �            1259    16443    customer_id_seq    SEQUENCE     x   CREATE SEQUENCE public.customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.customer_id_seq;
       public       postgres    false    6            �            1259    16445    item_id_seq    SEQUENCE     t   CREATE SEQUENCE public.item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.item_id_seq;
       public       postgres    false    6            �            1259    16447    items    TABLE     �   CREATE TABLE public.items (
    item_id integer NOT NULL,
    item_name character varying(25) NOT NULL,
    category_id integer NOT NULL,
    item_price real,
    item_stock integer NOT NULL,
    production_date date NOT NULL
);
    DROP TABLE public.items;
       public         postgres    false    6            �            1259    16450    manager    TABLE       CREATE TABLE public.manager (
    manager_id integer NOT NULL,
    manager_name character varying(25) NOT NULL,
    hire_date date NOT NULL,
    manager_salary integer NOT NULL,
    manager_email character varying(25) NOT NULL,
    manager_contact_no character varying(25) NOT NULL
);
    DROP TABLE public.manager;
       public         postgres    false    6            �            1259    16453    material_id_seq    SEQUENCE     x   CREATE SEQUENCE public.material_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.material_id_seq;
       public       postgres    false    6            �            1259    16455    monthly_expense    TABLE       CREATE TABLE public.monthly_expense (
    bill_id integer NOT NULL,
    manager_id integer NOT NULL,
    house_rent integer NOT NULL,
    electricity_bill integer NOT NULL,
    others integer NOT NULL,
    bill_date date NOT NULL,
    month character varying(25) NOT NULL
);
 #   DROP TABLE public.monthly_expense;
       public         postgres    false    6            �            1259    16458    orders    TABLE       CREATE TABLE public.orders (
    order_id integer NOT NULL,
    item_id integer NOT NULL,
    manager_id integer NOT NULL,
    customer_id integer NOT NULL,
    order_quantity integer NOT NULL,
    order_date date NOT NULL,
    total_price real NOT NULL
);
    DROP TABLE public.orders;
       public         postgres    false    6            �            1259    16461    raw_materials    TABLE     +  CREATE TABLE public.raw_materials (
    material_id integer NOT NULL,
    manager_id integer NOT NULL,
    vendor_id integer NOT NULL,
    material_name character varying(25) NOT NULL,
    available_stock integer NOT NULL,
    material_unit_price real NOT NULL,
    production_date date NOT NULL
);
 !   DROP TABLE public.raw_materials;
       public         postgres    false    6            �            1259    16464    user_id_seq    SEQUENCE     t   CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public       postgres    false    6            �            1259    16466    users    TABLE     �   CREATE TABLE public.users (
    user_id integer NOT NULL,
    role character varying(20) NOT NULL,
    password character varying(20) NOT NULL,
    status character varying(10) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false    6            �            1259    16469    vendor    TABLE     	  CREATE TABLE public.vendor (
    vendor_id integer NOT NULL,
    vendor_name character varying(25) NOT NULL,
    vendor_contact_no character varying(25) NOT NULL,
    vendor_email character varying(25) NOT NULL,
    vendor_address character varying(25) NOT NULL
);
    DROP TABLE public.vendor;
       public         postgres    false    6            �            1259    16472    vendor_id_seq    SEQUENCE     v   CREATE SEQUENCE public.vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.vendor_id_seq;
       public       postgres    false    6            w          0    16427    address 
   TABLE DATA               C   COPY public.address (addresss_id, street, city, state) FROM stdin;
    public       postgres    false    181   V;       x          0    16430    admin 
   TABLE DATA               T   COPY public.admin (admin_id, admin_name, admin_contact_no, admin_email) FROM stdin;
    public       postgres    false    182   �<       �           0    0    bill_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.bill_id_seq', 1, false);
            public       postgres    false    183            z          0    16435 
   categories 
   TABLE DATA               @   COPY public.categories (category_id, category_name) FROM stdin;
    public       postgres    false    184   J=       �           0    0    category_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.category_id_seq', 1, false);
            public       postgres    false    185            |          0    16440    customer 
   TABLE DATA               c   COPY public.customer (customer_id, customer_name, customer_contact_no, customer_email) FROM stdin;
    public       postgres    false    186   �=       �           0    0    customer_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.customer_id_seq', 1, false);
            public       postgres    false    187            �           0    0    item_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.item_id_seq', 1, false);
            public       postgres    false    188                      0    16447    items 
   TABLE DATA               i   COPY public.items (item_id, item_name, category_id, item_price, item_stock, production_date) FROM stdin;
    public       postgres    false    189   �>       �          0    16450    manager 
   TABLE DATA               y   COPY public.manager (manager_id, manager_name, hire_date, manager_salary, manager_email, manager_contact_no) FROM stdin;
    public       postgres    false    190   �?       �           0    0    material_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.material_id_seq', 1, false);
            public       postgres    false    191            �          0    16455    monthly_expense 
   TABLE DATA               v   COPY public.monthly_expense (bill_id, manager_id, house_rent, electricity_bill, others, bill_date, month) FROM stdin;
    public       postgres    false    192   \@       �          0    16458    orders 
   TABLE DATA               u   COPY public.orders (order_id, item_id, manager_id, customer_id, order_quantity, order_date, total_price) FROM stdin;
    public       postgres    false    193   #A       �          0    16461    raw_materials 
   TABLE DATA               �   COPY public.raw_materials (material_id, manager_id, vendor_id, material_name, available_stock, material_unit_price, production_date) FROM stdin;
    public       postgres    false    194   �A       �           0    0    user_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.user_id_seq', 1, false);
            public       postgres    false    195            �          0    16466    users 
   TABLE DATA               @   COPY public.users (user_id, role, password, status) FROM stdin;
    public       postgres    false    196   `B       �          0    16469    vendor 
   TABLE DATA               i   COPY public.vendor (vendor_id, vendor_name, vendor_contact_no, vendor_email, vendor_address) FROM stdin;
    public       postgres    false    197   1C       �           0    0    vendor_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.vendor_id_seq', 1, false);
            public       postgres    false    198            �           2606    16475    address_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (addresss_id);
 >   ALTER TABLE ONLY public.address DROP CONSTRAINT address_pkey;
       public         postgres    false    181    181            �           2606    16477 
   admin_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_pkey;
       public         postgres    false    182    182            �           2606    16479    categories_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (category_id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public         postgres    false    184    184            �           2606    16481    customer_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);
 @   ALTER TABLE ONLY public.customer DROP CONSTRAINT customer_pkey;
       public         postgres    false    186    186            �           2606    16483 
   items_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_pkey PRIMARY KEY (item_id);
 :   ALTER TABLE ONLY public.items DROP CONSTRAINT items_pkey;
       public         postgres    false    189    189            �           2606    16485    manager_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.manager
    ADD CONSTRAINT manager_pkey PRIMARY KEY (manager_id);
 >   ALTER TABLE ONLY public.manager DROP CONSTRAINT manager_pkey;
       public         postgres    false    190    190            �           2606    16487    monthly_expense_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.monthly_expense
    ADD CONSTRAINT monthly_expense_pkey PRIMARY KEY (bill_id);
 N   ALTER TABLE ONLY public.monthly_expense DROP CONSTRAINT monthly_expense_pkey;
       public         postgres    false    192    192                        2606    16489    raw_materials_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.raw_materials
    ADD CONSTRAINT raw_materials_pkey PRIMARY KEY (material_id);
 J   ALTER TABLE ONLY public.raw_materials DROP CONSTRAINT raw_materials_pkey;
       public         postgres    false    194    194                       2606    16491 
   users_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    196    196                       2606    16493    vendor_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.vendor
    ADD CONSTRAINT vendor_pkey PRIMARY KEY (vendor_id);
 <   ALTER TABLE ONLY public.vendor DROP CONSTRAINT vendor_pkey;
       public         postgres    false    197    197            w   e  x�u��N�0�����l6Lii��5�7�Ů�ތ�k+�}z����g�93=��0^��o޺�4�#K@�O)iV���PW��U�NQ\QEռ�<mO.�yW�[j���D~OS	�,޼�����%���c�mj��Ҍ���4��3n�2�Zp���%�(P)
7xg('����'������кS.��K��Q(��Rx����→�w���Rkk�
����P˶<-2�S�w�;����l�K��&G��.��~䕖	J�X@��-�3Ӈ�M5f&4,7��EG7|�5�X9���T�.�6Oc�>t�ؖݘO���0T��<z�U�{R����?���(��O��0      x   o   x�340��M���O)�Q�H,N��40452Bs#�\������Cznbf�^r~.�!P*8#����������,��΀�(39�(%�����������.�T�WV���� (y(d      z   {   x�̱�0����~jq�eD�*&V��XjD���,|=���N:j	8!�pR[]#\K	U�����6���)��A;zGs����'��Ȯ3��#�_�2�W,U��E��y�iU�L�y@�?��$�      |   �   x���K�0 �u{B[D�q7C)X��%��� D?]�4�2?*�X���b;YTbAC�U^�`�Hc˅ǩǗLV���u����F������X���zT.�y�*���I%ފ�[m��1*�����~���^�%��3��lw��\{���ms���{f�`�ᒇ���@:��<����U�*2�2PeJ�1D�x|.t�8�wY3�@         �   x�e���0���.�ݶ�pŃ1^H�zi����w+"������<���I��B��򔲄c���M�pk�F�P5wh60`c�9�1gԝL'xQ�GP�캋4H=����ހ	��^�� gȊ�K�G��=��Ȏ�[��V��sۇA��X�҇d��=
�Wc�1e;���͌r�p��ݣD�|i��$I^hJ      �   �   x�����0Dϓ�ʂ�|���(X��)��^�
\�~=�Ӝ`��"p��Q�z�(�_u*�!���9��b%��թXLr�6�����6��MPFV��Kw�Цm��_����̰*U^t\��1��]>&߲�zv��baO��|x��i��JlQ����R~
$N1�8�[B�&���F���1��\B����      �   �   x�U��
�0�s�.��[��8�$x��E��0e�����&�n���~�i-�4	� ���g\a��A7���d��K���"	Nq���ǌk�>�60CC+m=�������D��>�J(��Z�u��������F��,��\Y,�K�Z��������+u�׋:ǋ�V�ZX7��ޜwƘ/�DI      �   �   x�]��� �o��R����j[�Dr�^A���!�{D�&=�H<��e2/�=̡�\�H�Ez3���8ԗ�Gb�f�h����l"��yʡ�;�3�K����"�I~�C	����M����[j.�����������+�� �*N      �   �   x�Eν�@ ��{
_ �St�|	�K�@b;�����Ւ0 _ !��:�9����-A
ȝ��RC��g�E3p"�\��7��
�O����X6��p+�<U����m�����uyÕ*{��s_{�(d      �   �   x�m���0E��ǘ��7Cր��E��ٞ�L{n�q�����yv�����^t�S�'�mx��2����/�ԐV+=�!��v����x��*�O�ϲ�3`5���k�`Ϗ�Q�%���
RL_1}��F��6H�M������������������J7�O;�A;��A+Z���,R�s�ʜ;��[1�      �   �   x�]��J�@F�7O�(e�L2?�Z
*E*T\��I �v~�������9��aO�*m��%V�bK7�'��m�p�/J�r7Й
�8����|Lq�i�䢪���~i6ѩ�pʎ��}�M���\(��Vpn6Wb�S.�t*8�f^!Gn���m�EeK]G����m��y�Ε����4�K8zrn�h��Fa\�����ٹ�`���{�D��C7څ�b�8���.��CSh�     