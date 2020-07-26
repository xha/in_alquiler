USE [AEALQUILER]
GO
/****** Object:  Table [dbo].[ISAL_Bancos]    Script Date: 24/07/2020 23:35:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ISAL_Bancos](
	[id_banco] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [nvarchar](200) NOT NULL,
	[codigo] [nvarchar](5) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_banco] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ISAL_Conceptos]    Script Date: 24/07/2020 23:35:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ISAL_Conceptos](
	[id_concepto] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [nvarchar](200) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_concepto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ISAL_CuentasBancarias]    Script Date: 24/07/2020 23:35:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ISAL_CuentasBancarias](
	[id_cb] [int] IDENTITY(1,1) NOT NULL,
	[nro_cuenta] [nvarchar](20) NOT NULL,
	[tipo_cuenta] [nvarchar](20) NOT NULL,
	[id_concepto] [int] NOT NULL,
	[id_banco] [int] NOT NULL,
	[CodVend] [nvarchar](20) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_cb] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[ISAL_Bancos] ON 

INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (1, N'Banco de Venezuela S.A.C.A. Banco Universal', N'0102', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (2, N'Venezolano de Crédito, S.A. Banco Universal', N'0104', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (3, N'Banco Mercantil, C.A. Banco Universal', N'0105', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (4, N'Banco Provincial, S.A. Banco Universal', N'0108', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (5, N'Bancaribe C.A. Banco Universal', N'0114', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (6, N'Banco Occidental de Descuento, Banco Universal C.A', N'0116', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (7, N'Banco Caroní C.A. Banco Universal', N'0128', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (8, N'Banesco Banco Universal S.A.C.A.', N'0134', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (9, N'Banco Sofitasa, Banco Universal', N'0137', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (10, N'Banco Plaza, Banco Universal', N'0138', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (11, N'Banco de la Gente Emprendedora C.A', N'0146', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (12, N'BFC Banco Fondo Común C.A. Banco Universal', N'0151', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (13, N'100% Banco, Banco Universal C.A.', N'0156', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (14, N'DelSur Banco Universal C.A.', N'0157', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (15, N'Banco del Tesoro, C.A. Banco Universal', N'0163', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (16, N'Banco Agrícola de Venezuela, C.A. Banco Universal', N'0166', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (17, N'Bancrecer, S.A. Banco Microfinanciero', N'0168', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (18, N'Mi Banco, Banco Microfinanciero C.A.', N'0169', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (19, N'Banco Activo, Banco Universal', N'0171', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (20, N'Bancamica, Banco Microfinanciero C.A.', N'0172', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (21, N'Banco Internacional de Desarrollo, C.A. Banco Universal', N'0173', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (22, N'Banplus Banco Universal, C.A', N'0174', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (23, N'Banco Bicentenario del Pueblo de la Clase Obrera, Mujer y Comunas B.U.', N'0175', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (24, N'Novo Banco, S.A. Sucursal Venezuela Banco Universal', N'0176', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (25, N'Banco de la Fuerza Armada Nacional Bolivariana, B.U.', N'0177', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (26, N'Citibank N.A.', N'0190', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (27, N'Banco Nacional de Crédito, C.A. Banco Universal', N'0191', 1)
INSERT [dbo].[ISAL_Bancos] ([id_banco], [descripcion], [codigo], [activo]) VALUES (28, N'Instituto Municipal de Crédito Popular', N'0601', 1)
SET IDENTITY_INSERT [dbo].[ISAL_Bancos] OFF
SET IDENTITY_INSERT [dbo].[ISAL_Conceptos] ON 

INSERT [dbo].[ISAL_Conceptos] ([id_concepto], [descripcion], [activo]) VALUES (1, N'Arrendamiento', 1)
INSERT [dbo].[ISAL_Conceptos] ([id_concepto], [descripcion], [activo]) VALUES (2, N'Gastos Comunes', 1)
SET IDENTITY_INSERT [dbo].[ISAL_Conceptos] OFF
ALTER TABLE [dbo].[ISAL_Bancos] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISAL_Conceptos] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISAL_CuentasBancarias] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISAL_CuentasBancarias]  WITH CHECK ADD  CONSTRAINT [pk_cb_banco] FOREIGN KEY([id_banco])
REFERENCES [dbo].[ISAL_Bancos] ([id_banco])
GO
ALTER TABLE [dbo].[ISAL_CuentasBancarias] CHECK CONSTRAINT [pk_cb_banco]
GO
ALTER TABLE [dbo].[ISAL_CuentasBancarias]  WITH CHECK ADD  CONSTRAINT [pk_cb_concepto] FOREIGN KEY([id_concepto])
REFERENCES [dbo].[ISAL_Conceptos] ([id_concepto])
GO
ALTER TABLE [dbo].[ISAL_CuentasBancarias] CHECK CONSTRAINT [pk_cb_concepto]
GO

SET IDENTITY_INSERT [dbo].[ISAL_Accion] ON
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (31, N'bancos-index', N'Bancos Inicio', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (32, N'bancos-create', N'Bancos Crear', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (33, N'bancos-update', N'Bancos Actualizar', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (34, N'bancos-view', N'Bancos Vista', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (35, N'bancos-delete', N'Bancos Desactivar', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (36, N'conceptos-index', N'Conceptos Inicio', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (37, N'conceptos-create', N'Conceptos Crear', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (38, N'conceptos-update', N'Conceptos Actualizar', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (39, N'conceptos-view', N'Conceptos Vista', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (40, N'conceptos-delete', N'Conceptos Desactivar', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (41, N'cuentas-bancarias-index', N'Cuentas Bancarias Inicio', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (42, N'cuentas-bancarias-create', N'Cuentas Bancarias Crear', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (43, N'cuentas-bancarias-update', N'Cuentas Bancarias Actualizar', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (44, N'cuentas-bancarias-view', N'Cuentas Bancarias Vista', 1)
INSERT [dbo].[ISAL_Accion] ([id_accion], [descripcion], [alias], [activo]) VALUES (45, N'cuentas-bancarias-delete', N'Cuentas Bancarias Desactivar', 1)
SET IDENTITY_INSERT [dbo].[ISAL_Accion] OFF


INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 31, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 32, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 33, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 34, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 35, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 36, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 37, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 38, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 39, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 40, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 41, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 42, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 43, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 44, 1)
INSERT [dbo].[ISAL_RolAccion] ([id_rol], [id_accion], [modifica]) VALUES (3, 45, 1)
