#Documentación de funciones
#https://stackoverflow.com/questions/9195455/how-to-document-a-method-with-parameters

#Buen resumen Python
#https://www.freecodecamp.org/espanol/news/operadores-basicos-en-python-con-ejemplos/

def distancia( x1, x2, y1, y2 ):
    """
    Función que calcula la distancia en el plano cartesiano.
    https://www.uaeh.edu.mx/docencia/P_Presentaciones/prepa3/2019/Coordenadas.pdf
    @param: real Coordenada 1 en eje x
    @param: real Coordenara 2 en eje x
    @param: real Coordenada 1 en eje y
    @param: real Coordenara 2 en eje y
    @return:real la distancia entre dos puntos del plano. 
    """
    salida = 0
    salida = ((x2-x1)**2+(y2-y1)**2)**0.5
    return round(salida, 2) #Redondeamos con dos decimales.

#--------- Probando las funciones -------------------

#Si las coordenadas son iguales, hay una diagonal.
#Estas coordenadas representan un cuadro de distancia.
#print(distancia(0,1,0,1)) 

#Estas coordenadas representan una diagonal con mucha distancia distancia.
#print(distancia(0,8,0,8)) 

#Estas coordenadas representan una columna con mucha distancia distancia.
#print(distancia(5,5,1,8)) 

#print(distancia(1,2,1,3)) #dio 2.24
#print(distancia(4,2,2,3)) #dio 2.24
print(distancia(3,2,1,3)) 



