import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:pull_to_refresh/pull_to_refresh.dart';

import 'package:app/src/models/encuestas_response.dart';
import 'package:app/src/services/encuestas_service.dart';

class EncuestasPage extends StatefulWidget {
  const EncuestasPage({Key? key}) : super(key: key);
  static const String routeName = 'encuestas-page';

  @override
  _EncuestasPageState createState() => _EncuestasPageState();
}

class _EncuestasPageState extends State<EncuestasPage> {
  final RefreshController _refreshController = RefreshController(
    initialRefresh: false,
  );
  List<EncuestaResponse> encuestas = <EncuestaResponse>[];

  @override
  void initState() {
    super.initState();
    _cargarEncuestas();
  }

  Future<void> _cargarEncuestas() async {
    encuestas = await EncuestasService.getEncuestas();
    setState(() {});
    _refreshController.refreshCompleted();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: const Text('Lista de encuestas'),
      ),
      body: SmartRefresher(
        controller: _refreshController,
        enablePullDown: true,
        onRefresh: _cargarEncuestas,
        header: WaterDropHeader(
          complete: Icon(
            Icons.check,
            color: Colors.blue[400],
          ),
          waterDropColor: Colors.blue[400]!,
        ),
        child: Container(
          margin: const EdgeInsets.only(top: 20.0),
          child: _listViewEncuestas(),
        ),
      ),
    );
  }

  ListView _listViewEncuestas() {
    return ListView.separated(
      physics: const BouncingScrollPhysics(),
      itemCount: encuestas.length,
      itemBuilder: (_, i) => EncuestaListTile(encuesta: encuestas[i]),
      separatorBuilder: (_, i) => const Divider(),
    );
  }
}

class EncuestaListTile extends StatelessWidget {
  const EncuestaListTile({
    Key? key,
    required this.encuesta,
  }) : super(key: key);

  final EncuestaResponse encuesta;

  @override
  Widget build(BuildContext context) {
    return ListTile(
      leading: CircleAvatar(
        child: Text(encuesta.titulo.substring(0, 2)),
        backgroundColor: Colors.blue[100],
      ),
      title: Text(encuesta.titulo),
      onTap: () {
        final encuestasSerice = Provider.of<EncuestasService>(
          context,
          listen: false,
        );
        encuestasSerice.encuesta = encuesta;
        Navigator.pushNamed(context, 'encuesta-page');
      },
    );
  }
}
