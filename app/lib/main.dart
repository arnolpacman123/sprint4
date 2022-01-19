import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'package:app/src/routes/routes.dart';
import 'package:app/src/services/encuestas_service.dart';
import 'package:app/src/services/navigation_service.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MultiProvider(
      providers: [
        ChangeNotifierProvider(create: (_) => EncuestasService()),
        ChangeNotifierProvider(create: (_) => NavigationService(),),
      ],
      child: MaterialApp(
        debugShowCheckedModeBanner: false,
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        initialRoute: initialRoute,
        routes: routes,
      ),
    );
  }
}
