import 'package:app/src/services/navigation_service.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'package:app/src/models/encuestas_response.dart';
import 'package:app/src/services/encuestas_service.dart';

class EncuestaPage extends StatefulWidget {
  const EncuestaPage({Key? key}) : super(key: key);
  static const String routeName = 'encuesta-page';

  @override
  _EncuestaPageState createState() => _EncuestaPageState();
}

class _EncuestaPageState extends State<EncuestaPage> {
  late List<List<List<dynamic>>> selectedRadios;
  late EncuestasService encuestasService;
  late EncuestaResponse encuesta;
  List<Seccion> secciones = [];

  @override
  void initState() {
    super.initState();
    encuestasService = Provider.of<EncuestasService>(context, listen: false);
    encuesta = encuestasService.encuesta;
    secciones = encuesta.secciones;
    selectedRadios = [];
  }

  setSelectedRadio(
    int seccionIndex,
    int preguntaIndex,
    String value,
    String pregunta,
  ) {
    setState(() {
      selectedRadios[seccionIndex][preguntaIndex][0] = value;
      selectedRadios[seccionIndex][preguntaIndex][1] = pregunta;
    });
  }

  @override
  Widget build(BuildContext context) {
    final navigationService = Provider.of<NavigationService>(
      context,
      listen: false,
    );
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: Text(encuesta.titulo),
      ),
      body: Container(child: _pageViewSecciones()),
      bottomNavigationBar: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          ElevatedButton(
            onPressed: () {
              navigationService.decrementPage(0);
              setState(() {});
            },
            child: const Text('Anterior'),
          ),
          const SizedBox(width: 10.0),
          (navigationService.currentPage != secciones.length - 1)
              ? ElevatedButton(
                  onPressed: () {
                    navigationService.incrementPage(secciones.length - 1);
                    setState(() {});
                  },
                  child: const Text('Siguiente'),
                )
              : ElevatedButton(
                  onPressed: () async {},
                  child: const Text('Enviar'),
                )
        ],
      ),
    );
  }

  PageView _pageViewSecciones() {
    final navigationService = Provider.of<NavigationService>(context);
    return PageView.builder(
      controller: navigationService.pageController,
      physics: const BouncingScrollPhysics(),
      itemCount: secciones.length,
      itemBuilder: (_, i) {
        final seccion = secciones[i];
        final preguntas = seccion.preguntas;
        selectedRadios.add([]);
        return SingleChildScrollView(
          child: Container(
            margin: const EdgeInsets.symmetric(
              horizontal: 30.0,
              vertical: 40.0,
            ),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Text(
                  secciones[i].titulo,
                  style: const TextStyle(
                    fontSize: 20.0,
                    fontWeight: FontWeight.w500,
                  ),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 30.0),
                _listViewPreguntas(preguntas, i),
              ],
            ),
          ),
        );
      },
    );
  }

  ListView _listViewPreguntas(List<Pregunta> preguntas, int seccionIndex) {
    return ListView.separated(
      physics: const ClampingScrollPhysics(),
      scrollDirection: Axis.vertical,
      shrinkWrap: true,
      separatorBuilder: (_, index) => const Divider(height: 50.0),
      itemCount: preguntas.length,
      itemBuilder: (_, index) {
        final pregunta = preguntas[index];
        final opciones = pregunta.opciones;
        selectedRadios[seccionIndex].add(["", ""]);
        return Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              '${index + 1}. ${pregunta.enunciado}',
              style: const TextStyle(fontSize: 15.0),
              textAlign: TextAlign.justify,
            ),
            ListView.builder(
              physics: const ClampingScrollPhysics(),
              shrinkWrap: true,
              itemCount: opciones.length,
              itemBuilder: (_, i) {
                final opcion = opciones[i];
                return RadioListTile<String>(
                  value: opcion.valor,
                  groupValue: selectedRadios[seccionIndex][index][0],
                  onChanged: (value) {
                    setSelectedRadio(seccionIndex, index, value!, pregunta.id);
                  },
                  title: Text(opcion.valor),
                );
              },
            )
          ],
        );
      },
    );
  }
}
