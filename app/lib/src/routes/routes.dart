import 'package:flutter/widgets.dart' show Widget, BuildContext;
import 'package:app/src/pages/encuestas_page.dart';
import 'package:app/src/pages/encuesta_page.dart';

const String initialRoute = EncuestasPage.routeName;

final Map<String, Widget Function(BuildContext)> routes = {
  EncuestasPage.routeName: (_) => const EncuestasPage(),
  EncuestaPage.routeName: (_) => const EncuestaPage(),
};
