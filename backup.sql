PGDMP     4    7    
        	    u            absensi    10.0    10.0 #    &           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            '           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            (           1262    16393    absensi    DATABASE     �   CREATE DATABASE absensi WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE absensi;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            )           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            *           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16431    admin_id_seq    SEQUENCE     n   CREATE SEQUENCE admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.admin_id_seq;
       public       postgres    false    3            �            1259    16433    admin    TABLE     |  CREATE TABLE admin (
    admin_id integer DEFAULT nextval('admin_id_seq'::regclass) NOT NULL,
    role integer NOT NULL,
    username character varying(255) NOT NULL,
    password text NOT NULL,
    email character varying(255) NOT NULL,
    login_attempt integer DEFAULT 0 NOT NULL,
    last_login timestamp without time zone,
    is_locked_out boolean DEFAULT false NOT NULL
);
    DROP TABLE public.admin;
       public         postgres    false    198    3            �            1259    16470    admin_roles_id_seq    SEQUENCE     t   CREATE SEQUENCE admin_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.admin_roles_id_seq;
       public       postgres    false    3            �            1259    16448    admin_roles    TABLE     �   CREATE TABLE admin_roles (
    id integer DEFAULT nextval('admin_roles_id_seq'::regclass) NOT NULL,
    "Role" character varying(255) NOT NULL
);
    DROP TABLE public.admin_roles;
       public         postgres    false    205    3            �            1259    16458    attendance_id_seq    SEQUENCE     s   CREATE SEQUENCE attendance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.attendance_id_seq;
       public       postgres    false    3            �            1259    16453 
   attendance    TABLE     �   CREATE TABLE attendance (
    attendance_id integer DEFAULT nextval('attendance_id_seq'::regclass) NOT NULL,
    jemaat_id integer NOT NULL,
    title_id integer NOT NULL,
    datetime timestamp without time zone NOT NULL
);
    DROP TABLE public.attendance;
       public         postgres    false    202    3            �            1259    16462    attendance_listing_id    SEQUENCE     w   CREATE SEQUENCE attendance_listing_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.attendance_listing_id;
       public       postgres    false    3            �            1259    16464    attendance_listing    TABLE     �   CREATE TABLE attendance_listing (
    id integer DEFAULT nextval('attendance_listing_id'::regclass) NOT NULL,
    title character varying(255) NOT NULL,
    created_date_time timestamp without time zone NOT NULL
);
 &   DROP TABLE public.attendance_listing;
       public         postgres    false    203    3            �            1259    16394    jemaat_id_seq    SEQUENCE     o   CREATE SEQUENCE jemaat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.jemaat_id_seq;
       public       postgres    false    3            �            1259    16396    jemaat    TABLE     �  CREATE TABLE jemaat (
    jemaat_id integer DEFAULT nextval('jemaat_id_seq'::regclass) NOT NULL,
    nama_lengkap character varying(255) NOT NULL,
    nama_panggilan character varying(50) NOT NULL,
    golongan_darah character varying(2) DEFAULT 'A'::character varying NOT NULL,
    hobi character varying(255),
    alamat character varying(255) NOT NULL,
    tempat_lahir character varying(50) NOT NULL,
    tanggal_lahir date NOT NULL,
    status character varying(255) NOT NULL,
    nomor_telepon character varying(20) NOT NULL,
    id_line character varying(255),
    instagram character varying(255),
    kontak_keluarga character varying(255),
    baptisan_air boolean DEFAULT false NOT NULL,
    pelayanan character varying(255) DEFAULT 'belum melayani di Youthshalom'::character varying NOT NULL,
    pa boolean DEFAULT false NOT NULL,
    komsel character varying(255) DEFAULT 'belum ikut'::character varying NOT NULL
);
    DROP TABLE public.jemaat;
       public         postgres    false    196    3                      0    16433    admin 
   TABLE DATA               m   COPY admin (admin_id, role, username, password, email, login_attempt, last_login, is_locked_out) FROM stdin;
    public       postgres    false    199   �(                 0    16448    admin_roles 
   TABLE DATA               *   COPY admin_roles (id, "Role") FROM stdin;
    public       postgres    false    200   �)                 0    16453 
   attendance 
   TABLE DATA               K   COPY attendance (attendance_id, jemaat_id, title_id, datetime) FROM stdin;
    public       postgres    false    201   �)       "          0    16464    attendance_listing 
   TABLE DATA               C   COPY attendance_listing (id, title, created_date_time) FROM stdin;
    public       postgres    false    204   �)                 0    16396    jemaat 
   TABLE DATA               �   COPY jemaat (jemaat_id, nama_lengkap, nama_panggilan, golongan_darah, hobi, alamat, tempat_lahir, tanggal_lahir, status, nomor_telepon, id_line, instagram, kontak_keluarga, baptisan_air, pelayanan, pa, komsel) FROM stdin;
    public       postgres    false    197   *       +           0    0    admin_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('admin_id_seq', 10, true);
            public       postgres    false    198            ,           0    0    admin_roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('admin_roles_id_seq', 1, false);
            public       postgres    false    205            -           0    0    attendance_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('attendance_id_seq', 11, true);
            public       postgres    false    202            .           0    0    attendance_listing_id    SEQUENCE SET     <   SELECT pg_catalog.setval('attendance_listing_id', 3, true);
            public       postgres    false    203            /           0    0    jemaat_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('jemaat_id_seq', 115, true);
            public       postgres    false    196            �
           2606    16443    admin admin_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_pkey;
       public         postgres    false    199            �
           2606    16452    admin_roles admin_roles_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY admin_roles
    ADD CONSTRAINT admin_roles_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.admin_roles DROP CONSTRAINT admin_roles_pkey;
       public         postgres    false    200            �
           2606    16469 *   attendance_listing attendance_listing_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY attendance_listing
    ADD CONSTRAINT attendance_listing_pkey PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.attendance_listing DROP CONSTRAINT attendance_listing_pkey;
       public         postgres    false    204            �
           2606    16457    attendance attendance_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY attendance
    ADD CONSTRAINT attendance_pkey PRIMARY KEY (attendance_id);
 D   ALTER TABLE ONLY public.attendance DROP CONSTRAINT attendance_pkey;
       public         postgres    false    201            �
           2606    16409    jemaat jemaat_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY jemaat
    ADD CONSTRAINT jemaat_pkey PRIMARY KEY (jemaat_id);
 <   ALTER TABLE ONLY public.jemaat DROP CONSTRAINT jemaat_pkey;
       public         postgres    false    197            �
           2606    16502    admin admin_roles_fkey    FK CONSTRAINT     j   ALTER TABLE ONLY admin
    ADD CONSTRAINT admin_roles_fkey FOREIGN KEY (role) REFERENCES admin_roles(id);
 @   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_roles_fkey;
       public       postgres    false    200    199    2713            �
           2606    16492 !   attendance jemaat_attendance_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY attendance
    ADD CONSTRAINT jemaat_attendance_fkey FOREIGN KEY (jemaat_id) REFERENCES jemaat(jemaat_id);
 K   ALTER TABLE ONLY public.attendance DROP CONSTRAINT jemaat_attendance_fkey;
       public       postgres    false    197    201    2709            �
           2606    16497 "   attendance listing_attendance_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY attendance
    ADD CONSTRAINT listing_attendance_fkey FOREIGN KEY (title_id) REFERENCES attendance_listing(id);
 L   ALTER TABLE ONLY public.attendance DROP CONSTRAINT listing_attendance_fkey;
       public       postgres    false    2717    204    201               �   x����m�0 �7=E�AR%�A�!e�5�@�|:}�z\ߎ���Ρ��[��>�Qz/� !Ɯ�g7tw4�C�{�T��~�^��x���~�~_����΄g�ᥴ�(�E�a|��:cԘ���r"��u�^��led7��Q�;��h%�Y���[��˲� �CB�            x�3�tL����2�t�HM�N-����� J��            x������ � �      "      x������ � �            x��|�r�6��5���Ijd��27�v�m��������*$�-��ϥ������+�#�w@��݉;��" 8 ��r��b��<��$_�����yI�~G܈S��q���'U��l#�����$�����o�j�lRaǑ}dG�/��uR>+aEvl[�c�~,v�'/�yM���>͗I9��4}Y����y�l�R'�*G.���.�4_.��-U��;%N�-@�U������f��m��gU�܇�si�cG��Dz���&_mޑ�YN�6�q��?G�)��*�Qф�v�;��q׉}��A�US�k"���v䉳�,w�2���%�-��e>|"r��q��GV�����������k=R<l�}�R��*��ωZ$%�Pl�$��Ŷ8�Tdi5�Ž�4��R��mA[���Fc�2ɱ��SQ�R=��"���dV�r]lSi�����J�TGG6��Rm�f;�̈́�|@T��'�N�T�T���U���&Y��jq��e�<�Q��I|z�Jr�̳��hG?Vs�M�]Ql����.��V%h>�j�G�`�� r� J����3���]W�.K��[�x��c�r�}�-�'�
�L6I^w��8�&��g�j0�na5w|XH���u#պR9I�tbٮ�K��Zu�
����8�C�p���3�����?bѾD^�Z���f�����jw�jѣ9�6)p�x�o�S65��V;l��@�8�$��n�n��N�j3+�2�"�i.+������)���2��Qy��/�2�	ZJ�-ɰ���L�m�mŚ�_w�s�q�̒�h�C��H`�����D~m2=�nC�~�b��@��5qh�O<�Ov�p�m��$k6r��>-�u�zU��)����-.0FS�cH{�H���S���1[�f]J�r*gY��n��e����7�kx�˻�
�����¡Q�c׶�w�3��ؖgHb����b�ڝ�}�m�َ�%O���9-��|K�-��4xL���ـ�
m J��O����on�_LVO����#ۅ�WFk�f5u�r���K����C��ȵ���sl!m'����6.O\�y�`1;�ǳl�4&a�R[��c�K�I��j{5���K3;d�Z��Be*w��K2��n���3'3o�{����<j(��C�[Xf*z6z5w�%�#�Z&bz,��J���-D��	���`�����F��x=�zj�C�!K3���}�+����ʴa��1y�~S���ߛZ�{�I��Ҏ�T~Rϩ��a!��\��%����W�sS��U�� !�Aຖx�(1٤43����Ϻ��t��rd���&��3�^=V�UG0�E_.�ӆG��v�z��Y�Y�+WP��'ҠV� +o������$�;�6���%4,��<ɠi�HV���b�i�$_����U�0:r"՗b�#�@��E�LG��f��%�yC������C$b�1�}W��^�q���@�8��d�˩���P#AQ~�V��"i�[��4ܰ��9�9������5xxC�f�]�`)�Z������&NZʦVX9�`x���a��|׷#�s��m����J�͏oO��d[|I�U���>��>�f��Bp$[h�7�Z	�Xe%Y�#2SK�r��_�3�~�2XߒV�Ua��=�e--G�/�
�P�H��l�~|��%����|��`�}7�"1/���Ň�n/L/P���'E^մ��Xa=��	6�!]b�ՏXb CϠ����bUu'9Zl��=@�D|<D-�Iǆ�1��M��<+r���;�A_W8����X���.���/�
1�F��,f�Lf�6�.2��%A}�[���%8~%0�3@��@T�S�-	gb���x�7^�6�38�A�w�i���X���z�{��5��8?��j��u�Y.��68̃dx���?���@4�Eu'O:ؠ;:	���W`�$Oq� 5���g��8P��Gz�#�(^�6��O�k�9A��B��n#����l�����Y�2q�������W%,ii�eВ��!<r z�s�'�0n"a���	�����ڹ���x[l7i2rBq	Q��t���)�1����H�/@.�	24'��2�.�Y�ay��9&�;=�s�й�=�C�A��bMsNO���qp��V���7r���"/�t�ʛ��u�4��j��F���Y�%�An4���k����E.�%n0*MD<��o�����cHb�=��6x��,�ȟ�J�-ZU�-84w��]oW�S&=�`s!z�I"�j���0	�觎��n}f'H��zstp��w�����21��lp���6���I�+���N߱ �p��p��� [ױ�+�p��CR>���vN~r%/r�]�EۯU���<�~��~�2��7��Ym�L�[�Z��ƾX��ҧ�'r�������������� ��(V�d��m��(�m���+r�m	s&���:C��`�BK,���l�#?�� !���k��`��z'�
�;A�'�j���k�iº-����"'X�q,�=A^_~<:@\��@s3ΰ�>ǻ/H�'�����$�X9�!�r*r��9�R�N��:�w,�5@]P|�K�|���Y=���v�0���1�l'X�t�AOe��l\��r�1�Z`������uRUI�@�M(�\)�x=$�=�gN�P�^�b�c��4�oQ�����6�1�aQ��]77Wӻ�OSyyw~�0�~8�w7��S�O���u-��x�^�����F�_�N?I[^H������g�Z��C�'� kR\�`��	9��b��yJ�ю1�?rն�J2�.i�2��^����O�ɼ�ԪTK�@�;���v��/�>;�n_$�Ї&�+83����:8�đ��xzJ���`����e;�ci�M�sX�C$ʼ	�Oh����&�|��\��4� )x���a"m��|"���a��m���r�y��+ ��IOYvc. ��z۽��w�yў&��wjLKηI�Ԭ#��6@ʕsb�Y=�_��y��XF�vS���b��t�R�y���^�+0���:��/ii�=U���^���2�W�-�C�mR� �t�ko�ZP�v��=���� ����y���U��uU��ǃؕQ�c���#�i�F�u��'�k*�
Ƶ��V���������3��[ӌb� �7�E��}p��z3v-˵�X|3�.���/+U��|�m�	�����czdԽȲ��6n�}��|F�#T
b�D L�Y0	�2@�@�I��
-g��V3x�R/�=�.�~,�z�'����A����q;�k,�'�ƃg�ȳR�)�S ����6lZ���dm�P�o�/תb��E��t�����6�\���t�,��9���,i�8����羧}6�2�<�X�4��|����k\��Ϧ�v�9D!<`1�b�G��=�c�����f>N�t���)��L�mђ�O�����w��ER�v�b2k:
j�$:$��'[��"#��^2-,bҾ�&�>缇Y(��Bg��X�3���8A0�ˢ��$�U��$0��+��t=xT�i�W��	u+�"+�b@�@��[������Ԩ���n���s�\Ք���P�uF���gE>$��t��[Q(���ċ�r�y%}�A�w�Й�j�?hb��(���?���f�E*M��V��f1�.){���&>��-oa�W�`���l�&=�mU,'��x����\,��g�l~0�|�2,4x+.�!�?n?�I`����ȋŴ\�����8*҅�)�G�D���{��E�m�Z� 惘�$<k�~-�-����՚܄<��i��f�%�iR�)���%Md�S�	�]^�f3SТ��\��Nf�VX���6��MC��
�+��� kġoY����Z��>d�J��\ao�`��;�{�t����B�[���5z�o�B�������+g���m3U��q�ߟr�D��w��t���X�X?��ZqK�gi/0�w���z�_�0    qB�v(ct"9Z��]<?�-+C�ѴI;�h��;i�!���� ��j�o�oO��������T/Ϲ �i�۾Z�<��pjSh"IRܿ_QG�%b�2x��������R�|O�% A� �j�B��)zg��92����������Z��tH6U��=E:���t����=��Z�\�W�>��z17��ԥ�%�O礋��;Sπ����6R����8�8�^�x��# M�S��qL�α��&Ol������2Yk�V/M��>���ٽw��VoS�G�����(L5�17󬝃ۏ]�C����[J�I̵��VՇUM8���C���	ہ�dv�t®}��ᡯ��[$�DWA����t�-x[����ʫ�#��&W%��Y�N7�_��M%o��kC �)�!��PbS��U?&Љ߃c���w�b&�In\&���0��P����1���e���ߊ�)�:�u
�FD~�/�7R�B~B?H>�����������%����b�(�Km�f��w���I��2Nq�V�J��Jˏlۇ�)������4_�+G��"�1����a��j �&=Lz$s��k:`+�4%���#�
m+zM�7$�	�q8��q�3�2�G��ZU�v���}�NNF���S��s3_��U�$U�l�)���u1��cY�uZK�'ms�d��fECU+��NW�4��e(��v�F#��B�}�v�r�ޓvN�TS&�b_H
E�"ߏ����ڠ�����^^�+-�,Y�����Al�p=�?�7��B�Xt��q.48��^x�M��}��d�z&���g�{W�Hr���csyT&�D���.�2(҈�Җ30�vY�DI������X�Ib>���E�׹��;A<l<THF�yе�;��p�C���	U@z���j�x������؅���f���{��O�Q�-[����EjX`Z�Fl�$�W&#ǎ�2�#8��`H�`7`o1$�4�nRq�M��o��|{��G��u,�x/�~܃�i>/2@������ �L�7}�f]P���4f�q
�#�y�MBnr5mF�g�5	w�N{99������|�L�S?���:z�\F���(2��xм0��=I{�$A@;�F8���]pN=+�wa�qaxe�����,;p50��ɇ��(p�63��������)�OQSb뒣�_u4�w{�M��y�貎���?I[ƭ��:�f�F����d�����y=$�v= u�����
5��kO�M�ff���PSS�����ly�j��qd}\4��b��y������VR�?t�ڀS���[���R�a�ϞH�w Z=���f�$��ev_d�͋9�d�����Ǟew�us��;"�E�ԥAq�+�D`y5�:Rd��
�a_�*�s2��1��	�\�"׊D�ܷ�)����x���CO|4I3l��ƅ��ܤ8fB�/��*-��y��N0�@͒�H�Yr3�랷�ohq���޺�(�E�(t����~DZײ�eN����uR6W�lҵ)�[�ڡ�ZI����8�`�~�q`C�����\���������7�R�����z"�ٵ�v��Z'��>��Γ��y|a��a��0=�V=��{���V����0-8�K��@G:�z	O�*����t}d�Vo�1NMC��`��jq!�^ &s�c%��s�
�:��WT�'��I��ے�3\�;G^��06R�����U���s��?�+P���@���z����'�g	]N��Ⱦ�+�>�����u:_g��d�^�I+R_��v�9^K!�m�CQ��5B��<~d����ŷ�8�=���{ ��2!;�A<ы�����{�CxCӪ$�{o��1z���$T����w���Ŷ�E��>�,���s]�,�\�l'���r�V�.��OF���. '�zE�	�� h���HöщZ]~��᷻/��~��.	��"��=�S�Q��s�g���&M !�+HUw{h�7:f/G�����`7�y.? ������ȳ�Y��r.�k��m�c�m�SR�+�ۃ����y�gjVz�HJ���m��t���	���j��^HHk6pQz��*8��%F����xO;��R�k�z\������1�:�_t�� �@\%�Νsis{�	ܒA8^�C�=�Kz��� r��0���\φ/��IL\�k�Bノ�l�+�|���'�c��h�~�����>5��W���:K�^�@Wbn��*ݧ7A������A캀�F�w]�%�9���b���K7�V2��$9Vk�1Áv���-�g�m��ks���ks(� ��#�a�v�H�[����]�D�K��sC�wM�q,���GQ(~ϊ2!�qQ��/�]�բh[r�`�y��\FՓA8E��"�dn���G;z����-�zj�NJ�J��j�~�.�f�Y�f�T9i�^��K�I>��c�����낫���
��<ߍ! � �zO�h�R-���3s1�dI�p�G�i���+fH0�W�3�/P䰦��Y�U^�����.�FO%.VE�f8�q�~*DM6���¨� �~�P�Y���}���oEendm�9�J�}��;Cߊ)������ͳ�j��Q���������lÉ+�E�Nc:�X�e���o)(/��li� �a$ŷ{H�����x!�>G�R �b
�"yGA��cG�/�^qj�"Y�Ei�����nC=@`�����ʁ��tU���@|�ῷs���`C]*E�Fiʎ�t�\P{�� 6t��"��j������p�����
�<J�P���3���V5<(�!�a"��9ݹ�1U��i�AIXz�
�d8��}�s����:2 |�qm:M��;���*��.�L��Q췻~L�wy�.�"7}�͖���>��E|	%���إ�N���˂M�-/2��@���МM]�y����]���1��4��y����%i`���+W�\�z����۲<�v�H(37�ox�;�����}W,j�����8���d�Mߕbe��ZJ�/�>�|~v��������3 �J��	�����Q���714����55���hpс ��
[D��Wd;C�� /{�c&����tG;�ϗ�#��|N����&�z��
����l�?V����|�-( �/��r�K����8Enac��gP`��#�t����E�N�u�6&�V�e��� ����5C�Q��/�3�2w�;��A~lO�,ʎ܁N�������FԦ��ӭZp�LO�מ��%O�ʦzb��@��^ S@�M��]dNZ����)��H������n�w�Q�T��i&<?>�ǟg����_w�Μ���T��"��.�4���*XFG�ˤ�V�*�]�~���2\K<�%0�=�"o�tl���d�ث!�.�  r3��S��}�`����K��	!B#JRi�C�S�}���F`��n�:�㑢�+�o����-����iڼҷPP4;�H�S�r#�	�Fʢ,��-�J�דg1a&��8&J2p� 
b8|K�GOc;�j��|4������[4�~[q�Tͦ�Ɖ����%zJ3��L��c���9)s����=t�PpƱ���1�<�:h����@t����pD��N��(�^F�MIY�K��2�dK�U�md�����q�1V�W'z�y�~�1�R�@<���߬���zőu.%-ݥ��j��St_k����t�o�7����w6|��Q��[�')��עjT+u�ź�
iq�۴Y wd9d�J[5�(����Ճ�;����Ek,`����uw������.+I�A��`�������!�oq$��_�����CW���RU�EƋ�ZG��%�s�?�Eׅ������W������M]�qc(T���$��濡�n��D�-&�Mo'EL��\ۖ�\կݗ;Ů�.����اoN�ME��&�4^M^֓E&��ɽ����䍿!��G�!B�CI�Za����L�>�t�2]���2Y��g F   d����MZ�C�T��L�R��{�����PP�+ɗ�j�ه���������9M�O[?O�NF����.L     