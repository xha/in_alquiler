create view VISAL_Clientes AS
select c.CodClie, c.Descrip as RazonSocial, p.CodLocal, i.descrip as DetalleLocal, p.Email,c.Direc1 
from saclie c 
inner join saprod_01 p on p.CodClie = c.CodClie
inner join sainsta i on i.codinst = p.codinst
where p.Activo = 1 and c.CodClie NOT LIKE 'D%'


alter table ISAL_CorreosProcesados add observacion nvarchar(200)
alter table ISAL_CorreosProcesados add CodVend varchar(10)

UPDATE ISAL_CorreosProcesados SET observacion=SAFACT.Notas1,CodVend=SAFACT.CodVend
FROM SAFACT WHERE ISAL_CorreosProcesados.NumeroD=SAFACT.NumeroD and ISAL_CorreosProcesados.TipoFac=SAFACT.TipoFac


